<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Comments;
use App\Models\Notifications;
use App\Models\Posts;
use App\Models\Queries;
use App\Models\Users;
use App\Models\Reports;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
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
        $prevUserCount = Users::where('created_at', '<=', now()->subDays(30))->count();
        $currUserCount = Users::where('type', '!=', 'admin')->where('created_at', '>=', now()->subDays(30))->count();
        $prevQryCount = Queries::where('query_date', '<=', now()->subDays(30))->count();
        $currQryCount = Queries::where('query_date', '>=', now()->subDays(30))->count();
        $prevPostCount = Posts::where('created_at', '<=', now()->subDays(30))->count();
        $currPostCount = Posts::where('created_at', '>=', now()->subDays(30))->count();
        $prevComCount = Comments::where('comment_date', '<=', now()->subDays(30))->count();
        $currComCount = Comments::where('comment_date', '>=', now()->subDays(30))->count();
        if ($prevUserCount > 0) {
            $userInc = ($currUserCount / $prevUserCount);
            $userInc = number_format((float)$userInc, 2, '.', '');
        } else {
            $userInc = (Users::where('type', '!=', 'admin')->count() === $currUserCount) ? 100 : 0; // Handle the case when there were no users in the previous month
        }
        if ($prevQryCount > 0) {
            $qryInc = ($currQryCount / $prevQryCount);
            $qryInc = number_format((float)$qryInc, 2, '.', '');
        } else {
            $qryInc = (Queries::count() === $currQryCount) ? 100 : 0; // Handle the case when there were no users in the previous month
        }
        if ($prevPostCount > 0) {
            $postInc = ($currPostCount / $prevPostCount);
            $postInc = number_format((float)$postInc, 2, '.', '');
        } else {
            $postInc = (Posts::count() === $currPostCount) ? 100 : 0; // Handle the case when there were no users in the previous month
        }
        if ($prevComCount > 0) {
            $comInc = ($currComCount / $prevComCount);
            $comInc = number_format((float)$comInc, 2, '.', '');
        } else {
            $comInc = (Comments::count() === $currComCount) ? 100 : 0; // Handle the case when there were no users in the previous month
        }
        $qrys = Queries::where('is_deleted', '=', '0')->count();
        $users = Users::where('type', '!=', 'admin')->count();
        $posts = Posts::where('is_deleted', '=', '0')->count();
        $comments = Comments::count();
        return view('admin.index', ['qrys' => $qrys, 'users' => $users, 'posts' => $posts, 'comments' => $comments, 'userInc' => $userInc, 'qryInc' => $qryInc, 'postInc' => $postInc, 'comInc' => $comInc, 'user' => Users::count()]);
    }

    public function line(Request $request)
    {
        if ($request->ajax()) {
            $endDate = Carbon::now();
            $startDate = $endDate->copy()->subWeek();
            $results = [];
            $results2 = [];
            $results3 = [];
            while ($startDate <= $endDate) {
                $countPosts = DB::table('posts')
                    ->whereDate('created_at', $startDate->toDateString())
                    ->where('is_deleted', '=', 0)
                    ->count();
                $countQueries = DB::table('queries')
                    ->whereDate('query_date', $startDate->toDateString())
                    ->where('is_deleted', '=', 0)
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

    public function donut(){
        $ver = Users::where('type', '=', 'student')->whereNotNull('email_verified_at')->count();
        $unver = Users::where('type', '=', 'student')->whereNull('email_verified_at')->count();
        $orgs = Users::where('type', '=', 'organization')->whereNotNull('email_verified_at')->count();
        return response()->json([$ver, $unver, $orgs]);
    }

    public function users(Request $request)
    {
        if ($request->ajax()) {
            $user = Users::find($request->id);
            $user->update(['is_disabled' => 1]);
            return response()->json($user);
        }
        $keyword = $request->input('filtertext', '');
        $keytype = $request->input('usertype', 'student');
        $isVerified = $request->input('is_verified', 'verified');
        $query = Users::query();
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->orWhere('id', 'like', "%$keyword%");
            });
        }
        ($isVerified == 'verified') ? $query->whereNotNull('email_verified_at') : $query->whereNull('email_verified_at');
        $query->where('type', '=', $keytype);
        $query->where('is_disabled', '=', 0);

        if ($request->has('delete')) {
            // $filteredUsers = $query->get(); // Retrieve filtered users
            $query->paginate(10);
            $query->update(['is_disabled' => 1]);

            return redirect()->back()->with('message', 'All matching users have been disabled.', ['s' => $keyword, 'type' => $keytype, 'ver' => $isVerified]);
        } else {
            $users = $query->paginate(10);
            return view('admin.users', compact('users'), ['s' => $keyword, 'type' => $keytype, 'ver' => $isVerified]);
        }
    }

    public function update(Request $request)
    {
        $user = Users::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
        ]);
        // return response()->json('');
        return back()->with('message', 'User updated successfully');
    }


    public function create(Request $request)
    {
        if ($request->ajax()) {
            if ($request->for == 'read') {
                $post = Posts::find($request->id);
                return response()->json($post);
            } else if ($request->for == 'edit') {
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
        if ($request->hasFile('image') || $request->caption != null) {
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
                    'created_at' => now()->setTimezone('Asia/Singapore')
                ]);
                $this->informUsers($post, $request->caption);
                return back()->with('message', 'Post uploaded!');
            }
            $post = DB::table('posts')->insertGetId([
                'users_id' => auth()->user()->id,
                'caption' => $request->caption,
                'created_at' => now()->setTimezone('Asia/Singapore')
            ]);
            $this->informUsers($post, $request->caption);
            return back()->with('message', 'Post uploaded!');
        } else {
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
            switch ($request['filter-radio']) {
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

        $query->where('users_id', '!=', '1111111111');
        $query->leftJoin('users', 'activities.users_id', '=', 'users.id');
        $logs = $query->paginate(10); // You can adjust the number of activities per page as needed
        return view('admin.logs', compact('logs'), ['d' => $rd, 's' => $keyword, 'show' => $show]);
    }

    public function logsAction(Request $request)
    {
        Activities::destroy($request->id);
        return session()->flash('message', 'Log activity is deleted successfully.');
    }

    public function forum(Request $request)
    {
        $qrys = Queries::where('is_deleted', 0)->with('users')->paginate(10);
        return view('admin.forum', ['posts' => $qrys]);
    }

    public function forum_modal(Request $request)
    {
        if ($request->type && $request->type == 'delete') {
            $comm = Comments::find($request->id);
            $comm->delete();
            return 'deleted';
        }
        $comments = Comments::where('queries_id', $request->id)->with('users')->orderBy('comment_date', 'DESC')->get();
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

    public function informUsers($post_id, $caption)
    {
        if($caption){
            $caption = ' has posted: "' . $caption;
        }else{
            $caption = ' posted an image.';
        }
        $cur = auth()->user();
        $users = Users::where('type', '!=', 'admin')->where('id', '!=', auth()->user()->id)->get();
        foreach ($users as $user) {
            Notifications::insert([
                'users_id' => $user->id,
                'author' => $cur->id,
                'content' => $caption,
                'posts_id' => $post_id,
            ]);
        }
    }

    public function reports(Request $request){
        if($request->ajax()){
            if($request->type == 'delete'){
                DB::table('reports')->where('id', $request->id)->delete();
                return 'Delete successful';
            }
            Reports::find($request->id)->update([
                'checked' => 1
            ]);
            $report = Reports::with(['users', 'sender'])
                        ->select('users.name', 'users.image', 'users.email', 'reports.*')
                        ->join('users', 'users.id', '=', 'reports.sender')
                        ->findOrFail($request->id);
            if($report->queries_id){
                $reportContent = Queries::where('id', '=', $report->queries_id)->get();
            }else{
                $reportContent = Comments::where('id', '=', $report->comments_id)->get();
            }
            return response()->json(['report' => $report, 'content' => $reportContent[0]]);
        }
        $reports = Reports::with(['users', 'sender'])
                        ->select('users.name', 'users.image', 'users.email', 'reports.*')
                        ->join('users', 'users.id', '=', 'reports.sender')
                        ->orderBy('created_at', 'DESC')->get();
        return view('admin.reports', ['reports' => $reports]);
    }

    // PYTHON CONNECTIONS
    public function getcbdata(){
        $response = Http::get('http://127.0.0.1:5001/getdata');

        if ($response->successful()) {
            $fileContents = $response->body();
            // return response()->json(['intents' => json_decode($fileContents)]);
            return view('admin.editcbdata', ['intents' => json_decode($fileContents)]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], 500);
        }
    }
}
