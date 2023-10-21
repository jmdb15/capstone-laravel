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
            
        // $new = DB::table('notifications')->select('notifications.users_id', 'notifications.content', 'users.name', 'users.image')
        //             ->join('users', 'users.id','=','notifications.users_id')
        //             ->where('notifications.posts_id', '=', 'null');
        // $new2 = Notifications::leftJoin('users', 'notifications.users_id', '=', 'users.id')
        //         ->whereNull("notifications.posts_id")
        //         ->orderBy('notifications.created_at', 'desc')
        //         ->select('notifications.content', 'notifications.id', 'users.image', 'users.name')
        //         ->limit(5)
        //         ->get();
        // dd($new2);
    }

    public function line(Request $request){
        if($request->ajax()){
            $endDate = Carbon::now();
            $startDate = $endDate->copy()->subWeek();
            $results = [];
            $results2 = [];
            while ($startDate <= $endDate) {
                $countPosts = DB::table('posts')
                    ->whereDate('created_at', $startDate->toDateString())
                    ->count();
                $countQueries = DB::table('queries')
                    ->whereDate('query_date', $startDate->toDateString())
                    ->count();
                $starDate = $startDate->format('d');
                $results[$starDate] = $countPosts;
                $results2[$starDate] = $countQueries;
                $startDate->addDay();
            }
            $ret = [$results, $results2];
            return $ret;
        }
    }

    public function users()
    {
        $users = Users::paginate(3);
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        $posts = Posts::where('is_deleted', 0)->orderBy('created_at', 'DESC')->get();
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
                return back()->with('message', 'Post is deleted.');
            } else if ($request->for == 'query') {
                Queries::find($request->id)->update([
                    'is_deleted' => '1'
                ]);
                // session()->flash('message', 'Student\' question is deleted.');
                return 'successful';
            }
        }
    }

    public function logs()
    {
        return view('admin.logs');
    }

    public function forum(Request $request)
    {
        $qrys = Queries::where('is_deleted', 0)->with('users')->get();
        return view('admin.forum', ['posts'=>$qrys]);
    }

    public function forum_modal(Request $request){
        if($request->type && $request->type == 'delete'){
            $comm = Comments::find($request->id);
            $comm->delete();
            return 'deleted';
        }
        $comments = Comments::where('queries_id',$request->id)->with('users')->orderBy('comment_date','DESC')->get();
        return response()->json($comments);
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
