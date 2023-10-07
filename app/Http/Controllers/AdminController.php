<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activities;
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
    public function index(Request $request){
        if($request->ajax()){
            $results = DB::select('SELECT COUNT(*) as count, activity FROM activities GROUP BY activity');
            return response()->json($results);
        }
        return view('admin.index');
    }

    public function users(){
        $users = Users::paginate(3);
        return view('admin.users', compact('users'));
    }

    public function create(){
        $posts = Posts::get();
        return view('admin.createpost', ['posts' => $posts]);
    }

    public function store(Request $request){
        $image = array();
        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach ($files as $i => $file){
                if($file->isValid()){
                    $fileNameWithExtension = $file;
                    $fileName = pathInfo($fileNameWithExtension, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                    $file->storeAs('public/posts/', $fileNameToStore);
                    array_push($image, $fileNameToStore);
                }
            }
            Posts::insert([
                'links' => implode('|', $image),
                'caption'=> $request->caption
            ]);
            return back()->with('message','Post uploaded!');
        }
        Posts::insert([
            'caption'=> $request->caption
        ]);
        return back()->with('message','Post uploaded!');
    }

    public function logs(){
        return view('admin.logs');
    }
    
    public function forum(){
        $vote_count = DB::select('((SELECT COUNT(*) as vote_count, comments_id from votes where checked = 1 GROUP BY comments_id) order by vote_count desc limit 1)');
        // $comments = DB::select('SELECT comments.*, users.name, users.image FROM comments INNER JOIN users on comments.users_id = users.id WHERE comments.id ='. $vote_count[0]->comments_id);
        $posts = Queries::with(['users'])->get();
        foreach($posts as $post){
            $votes = DB::select('((SELECT COUNT(*) as vote_count, comments_id from votes WHERE queries_id = '.$post->id.' and checked = 1 GROUP BY comments_id) order by vote_count desc limit 1)');
            $comment_count = DB::select('SELECT COUNT(*) as c FROM comments WHERE queries_id = '.$post->id);
            if(count($votes) == 0){
                $post['comments'] = DB::select('SELECT (0) as vote_count, ('.$comment_count[0]->c.') as comment_count, comments.*, users.name, users.image FROM comments INNER JOIN users ON comments.users_id = users.id WHERE comments.queries_id = '.$post->id.' ORDER BY id DESC LIMIT 1');
            }else{
                $post['comments'] = DB::select('SELECT '.$votes[0]->vote_count.' as vote_count, ('.$comment_count[0]->c.') as comment_count, comments.*, users.name, users.image FROM comments INNER JOIN users on comments.users_id = users.id WHERE comments.id = '. $votes[0]->comments_id);
            }

            $date = $post->query_date;
            $date = Carbon::parse($date);
            $customFormat = $date->format('F j, Y');
            $post['query_date'] = $customFormat;
        }
        // dd($posts);
        return view('admin.forum', ['posts'=>$posts, 'open'=>'false']);
    }

    public function filter(Request $request){
        if($request->ajax()){
            if($request->startdate == ''){
                $startDate = '2000-01-01';
            }else{
                $startDate = $request->startdate;
            }
            $endDate = $request->enddate;
            $logs = Activities::select('activities.*', 'users.name', 'users.image', 'users.email')
                        ->join('users', 'users.id','=','activities.users_id')
                        ->where('name','like','%'.$request->text.'%')
                        ->whereBetween('logged_at', [$startDate, $endDate])
                        ->get()
                        ->groupBy('users_id');
            return response()->json($logs);
        }
    }

}
