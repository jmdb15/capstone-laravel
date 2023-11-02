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
            // $results = DB::select('SELECT COUNT(*) as count, activity FROM activities GROUP BY activity');
            $guest = Activities::where('activity', '=', 'A Guest logged in.')->count();
            $verified = Users::whereNull('email_verified_at')->count();
            $notVerified = Users::whereNotNull('email_verified_at')->count();
            $loginCounts = DB::table('activities')
                ->select(DB::raw('SUM(CASE WHEN users.email_verified_at IS NOT NULL THEN 1 ELSE 0 END) as verified_count'), DB::raw('SUM(CASE WHEN users.email_verified_at IS NULL THEN 1 ELSE 0 END) as unverified_count'))
                ->join('users', 'activities.users_id', '=', 'users.id')
                ->where('activities.activity', '=', 'Logged in')
                ->whereBetween('activities.created_at', [now()->subMonth(), now()])
                ->first();
            
            $verifiedCount = $loginCounts->verified_count;
            $unverifiedCount = $loginCounts->unverified_count;
            
            $results = [$guest, $verifiedCount, $unverifiedCount];

            return response()->json($results);
        }
        // Query to get the value from the previous month
        $previousMonthValue = Users::whereYear('created_at', now()->subMonth()->year)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->count();

        // Query to get the value from the current month
        $currentMonthValue = Users::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        if ($previousMonthValue > 0) {
            $percentageIncrease = (($currentMonthValue - $previousMonthValue) / $previousMonthValue) * 100;
        } else {
            if(Users::count() === $currentMonthValue){
                $percentageIncrease = 100;
            }else{
                $percentageIncrease = 0; // Handle the case when there were no users in the previous month
            }
        }


        $qrys = Queries::where('is_deleted', '=', '0')->count();
        $users = Users::where('type', '!=', 'admin')->count();
        $posts = Posts::where('is_deleted', '=', '0')->count();
        $comments = Comments::count();
        return view('admin.index', ['qrys' => $qrys, 'users' => $users, 'posts' => $posts, 'comments' => $comments, 'userinc' => $percentageIncrease, 'prev' => $previousMonthValue, 'curr' => $currentMonthValue, 'user' => Users::count()]);
            
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
            $results3 = [];
            while ($startDate <= $endDate) {
                $countPosts = DB::table('posts')
                    ->whereDate('created_at', $startDate->toDateString())
                    ->where('is_deleted','=',0)
                    ->count();
                $countQueries = DB::table('queries')
                    ->whereDate('query_date', $startDate->toDateString())
                    ->where('is_deleted','=',0)
                    ->count();
                $countComments = DB::table('comments')
                    ->whereDate('comment_date', $startDate->toDateString())
                    ->count();
                $starDate = $startDate->format('d');
                $results[$starDate] = $countPosts;
                $results2[$starDate] = $countQueries;
                $results3[$starDate] = $countComments;
                $startDate->addDay();
            }
            $ret = [$results, $results2, $results3];
            return $ret;
        }
    }

    public function users(Request $request)
    {
        $keyword = $request->input('search', '');
        $keytype = $request->input('usertype', 'student');
        $query = Users::query();
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%")
                ->orWhere('id', 'like', "%$keyword%");
            });
        }
        $query->where('type', '=', $keytype);
        $users = $query->paginate(10); 
        return view('admin.users', compact('users'), ['s' => $keyword, 'type' => $keytype]);
    }

    public function update(Request $request){
        $user = Users::find($request->id);
        $user->update([
            'email' => $request->email,
            'type' => $request->type,
        ]);
        // return response()->json('');
        return back()->with('message', 'User updated successfully');
    }


    public function create(Request $request)
    {   
        if($request->ajax()){
            if($request->for == 'read'){
                $post = Posts::find($request->id);
                return response()->json($post);
            }else if($request->for == 'edit'){
                $post = Posts::find($request->id);
                $post->update([
                    'caption' => $request->caption
                ]);
                return session()->flash('message', 'Post edited successfully.');
            }
        }
        $posts = Posts::where('is_deleted', 0)->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.createpost', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $image = array();
        if($request->hasFile('image') || $request->caption != null){
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
                    'users_id' => auth()->user()->id,
                    'links' => implode('|', $image),
                    'caption' => $request->caption,
                    'created_at'=> now()->toDateString()
                ]);
                $this->informUsers($post, $request->caption);
                return back()->with('message', 'Post uploaded!');
            }
            // $post = Posts::insert([
            //     'caption' => $request->caption
            // ]);
            $post = DB::table('posts')->insertGetId([
                'users_id' => auth()->user()->id,
                'caption' => $request->caption
            ]);
            $this->informUsers($post, $request->caption);
            return back()->with('message', 'Post uploaded!');
        }else{
            // dd($request->all());
            return back()->with('errmessage', 'Please provide a caption or an image.');
        }
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

    public function logs(Request $request)
    {
        $startDate = $request->input('filter-radio', '');
        $rd = $request->input('filter-radio', '');
        $keyword = $request->input('search', '');

        $query = Activities::query();
        $query->select('activities.*', 'users.name', 'users.email');

        $show = 'All';
        if ($startDate) {
            switch($request['filter-radio']){
                case 1: 
                    $show = 'Last Day';
                    $startDate = now()->subDay()->toDateString();
                    break;
                case 7: 
                    $show = 'Last 7 days';
                    $startDate = now()->subWeek()->toDateString();
                    break;
                case 30: 
                    $show = 'Last Month';
                    $startDate = now()->subMonth()->toDateString();
                    break;
                case 365: 
                    $show = 'Last Year';
                    $startDate = now()->subYear()->toDateString();
                    break;
                default: 
                    $show = 'All';
                    $startDate = '2001-01-01';
                    break;
            }
            $enddate = now();
            $query->whereBetween('activities.created_at', [$startDate, $enddate]);
        }

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('users.name', 'like', "%$keyword%")
                ->orWhere('users.email', 'like', "%$keyword%");
            });
        }

        $query->leftJoin('users', 'activities.users_id', '=', 'users.id');
        $logs = $query->paginate(10); // You can adjust the number of activities per page as needed
        return view('admin.logs', compact('logs'), ['d' => $rd, 's' => $keyword, 'show' => $show]);
    }

    public function logsAction(Request $request){
        Activities::destroy($request->id);
        return session()->flash('message', 'Log activity is deleted successfully.');
    }

    public function forum(Request $request)
    {
        $qrys = Queries::where('is_deleted', 0)->with('users')->paginate(10);
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
                ->leftJoin('users', 'activities.users_id', '=', 'users.id')
                ->where('name', 'like', '%' . $request->text . '%')
                ->whereBetween('activities.created_at', [$startDate, $endDate])
                ->paginate(10);
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
