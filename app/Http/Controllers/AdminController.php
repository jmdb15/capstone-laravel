<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Comments;
use App\Models\Notifications;
use App\Models\Posts;
use App\Models\Queries;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $results = DB::select('SELECT COUNT(*) as count, activity FROM activities GROUP BY activity');
            return response()->json($results);
        }
        $qrys = Queries::count();
        $users = Users::count();
        $posts = Posts::count();
        $comments = Comments::count();
        return view('admin.index', ['qrys' => $qrys, 'users' => $users, 'posts' => $posts, 'comments' => $comments]);
        $endDate = Carbon::now();
        $startDate = $endDate->copy()->subWeek();
        $results = [];
        while ($startDate <= $endDate) {
            $count = DB::table('posts')
                ->whereDate('created_at', $startDate->toDateString())
                ->count();
            $results[$startDate->toDateString()] = $count;
            $startDate->addDay();
        }
        $endDate2 = Carbon::now();
        $startDate2 = $endDate2->copy()->subWeek();
        $results2 = [];
        while ($startDate2 <= $endDate2) {
            $count = DB::table('queries')
                ->whereDate('query_date', $startDate2->toDateString())
                ->count();
            $starDate2 = $startDate2->format('d');
            $results2[$starDate2] = $count;
            $startDate2->addDay();
        }
        // dd($results2);
        return view('admin.index');
    }

    public function users()
    {
        $users = Users::paginate(3);
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        $posts = Posts::get();
        return view('admin.createpost', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $image = array();
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $i => $file) {
                if ($file->isValid()) {
                    $fileNameWithExtension = $file;
                    $fileName = pathInfo($fileNameWithExtension, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    $file->storeAs('public/posts/', $fileNameToStore);
                    array_push($image, $fileNameToStore);
                }
            }
           $post = DB::table('posts')->insertGetId([
                'links' => implode('|', $image),
                'caption' => $request->caption
            ]);
            $this->informUsers($post, $request->caption);
            return back()->with('message', 'Post uploaded!');
        }
        // $post = Posts::insert([
        //     'caption' => $request->caption
        // ]);
        $post = DB::table('posts')->insertGetId([
            'caption' => $request->caption
        ]);
        $this->informUsers($post, $request->caption);
        return back()->with('message', 'Post uploaded!');
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->for == 'posts') {
                Posts::find($request->id)->update([
                    'is_deleted' => '1'
                ]);
                return back()->with('messages', 'Post is deleted.');
            } else if ($request->for == 'query') {
                Queries::find($request->id)->update([
                    'is_deleted' => '1'
                ]);
                return back()->with('messages', 'Question is deleted.');
            }
        }
    }

    public function logs()
    {
        return view('admin.logs');
    }

    public function forum()
    {
        // $vote_count = DB::select('((SELECT COUNT(*) as vote_count, comments_id from votes where checked = 1 GROUP BY comments_id) order by vote_count desc limit 1)');
        // $comments = DB::select('SELECT comments.*, users.name, users.image FROM comments INNER JOIN users on comments.users_id = users.id WHERE comments.id ='. $vote_count[0]->comments_id);
        $posts = Queries::with(['users'])->get();
        foreach ($posts as $post) {
            // $votes = DB::select('((SELECT COUNT(*) as vote_count, comments_id from votes WHERE queries_id = ' . $post->id . ' and checked = 1 GROUP BY comments_id) order by vote_count desc limit 1)');
            // $comment_count = DB::select('SELECT COUNT(*) as c FROM comments WHERE queries_id = ' . $post->id);
            // if (count($votes) == 0) {
            //     $post['comments'] = DB::select('SELECT (0) as vote_count, (' . $comment_count[0]->c . ') as comment_count, comments.*, users.name, users.image FROM comments INNER JOIN users ON comments.users_id = users.id WHERE comments.queries_id = ' . $post->id . ' ORDER BY id DESC');
            // } else {
            //     $post['comments'] = DB::select('SELECT ' . $votes[0]->vote_count . ' as vote_count, (' . $comment_count[0]->c . ') as comment_count, comments.*, users.name, users.image FROM comments INNER JOIN users on comments.users_id = users.id WHERE comments.id = ' . $votes[0]->comments_id);
            // }

            $post['comments'] = DB::table('comments')->join('users', 'users.id','=','comments.users_id')
                            ->select('comments.*', 'users.name', 'users.image')
                            ->where('queries_id', $post->id)
                            ->get();
            foreach($post->comments as $c){
                $c->vote_count  = DB::table('votes')
                                ->where('comments_id', $c->id)
                                ->where('queries_id', $post->id)
                                ->where('checked', 1)
                                ->count();
                // $c['vote_count'] = 4;
            }
            $date = $post->query_date;
            $date = Carbon::parse($date);
            $customFormat = $date->format('F j, Y');
            $post['query_date'] = $customFormat;
        }
        // dd($posts);
        return view('admin.forum', ['posts' => $posts, 'open' => 'false', 'see' => 'false']);
    }

    public function filter(Request $request)
    {
        if ($request->ajax()) {
            if ($request->startdate == '') {
                $startDate = '2000-01-01';
            } else {
                $startDate = $request->startdate;
            }
            $endDate = $request->enddate;
            $logs = Activities::select('activities.*', 'users.name', 'users.image', 'users.email')
                ->join('users', 'users.id', '=', 'activities.users_id')
                ->where('name', 'like', '%' . $request->text . '%')
                ->whereBetween('activities.created_at', [$startDate, $endDate])
                ->get()
                ->groupBy('users_id');
            return response()->json($logs);
        }
    }

    public function informUsers($post_id, $caption){
        $users = Users::get();
        foreach($users as $user){
            Notifications::insert([
                'users_id' => $user->id,
                'content' => 'There is a new post: "'.$caption.'"',
                'posts_id' => $post_id,
            ]);
        }
    }
}
