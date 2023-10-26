<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use Carbon\Carbon;
use App\Models\Comments;
use App\Models\Events;
use App\Models\Notifications;
use App\Models\Posts;
use App\Models\Queries;
use App\Models\Users;
use App\Models\Votes;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use App\Notifications\VerifyEmailNotification;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $ipp = $request->ip();

        $apiKey = '4ede6738dfd64a8982e1f4c783836c1b';
        $apiUrl = 'https://api.ipgeolocation.io/ipgeo?apiKey='.$apiKey;

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            // $city = $response->city;
            // $zip = $response->zipcode;
            $locationData = $response->json();
        }

        $users2 = ['jemuel', 'claire', 'anne', 'banag'];
        $users = 'jemuel';
        if ($request->ajax()) {
            $users2 = ['james', 'charles', 'gab', 'dada'];
            $users = 'james';
            return response()->json(['newData' => $users2]);
        }
        $badge = $this->badger();
        // dd($badge);, 'city' => $city, 'zip' => $zip
        return view('students.index', ['users' => $users2, 'ipp' => $ipp, 'response' => $locationData]);
    }

    # Sign in process
    public function process(Request $request)
    {
        $currentDateTime = Carbon::now();
        $formattedDate = $currentDateTime->toDateString(); // "2023-10-04"
        $user = Users::where('email', '=', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                // Set cookie   
                if(isset($request->remember) && !empty($request->remember)){
                    setCookie('email',$request->email,time()+3600);
                    setCookie('password',$request->password,time()+3600);
                }else{
                    setCookie('email','');
                    setCookie('password','');
                }

                $act = Activities::where('users_id', $user->id)->where('activity', 'Logged in')->where('created_at', $formattedDate)->first();
                if ($act == null) {
                    Activities::insert([
                        'users_id' => $user->id,
                        'activity' => 'Logged in'
                    ]);
                }
                if (Auth::check()) {
                    if (auth()->user()->type == 'student') {
                        return redirect('/about');
                    } else if (auth()->user()->type == 'admin') {
                        return redirect('/admin');
                    }
                }
            }
        } else {
            return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
        }
    }

    # Sign up process
    public function store(Request $request)
    {
        $validated = $request->validate([
            "id" => ['required', 'min:10'],
            "name" => ['required', 'min:4'],
            "email" => ['required', "email", Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:8'
        ]);
        // $validated['password'] = Hash::make($validated['password']);
        $validated['password'] = bcrypt($validated['password']);
        $user = Users::create($validated);
        Auth::login($user);

        return redirect('/verify'); # redirect somewhere
    }

    # Log out
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout successful');
    }

    public function verify(){
        return view('auth.verify-email');
    }

    public function about()
    {
        $notifs = $this->notifs();
        return view('students.about', ['notifs' => $notifs]);
    }

    public function postQuery(Request $request)
    {
        $user = auth()->user();
        $post = DB::table('queries')->insertGetId([
            'users_id' => $user->id,
            'query' => $request->question,
        ]);
        DB::table('activities')->insert([
                'users_id' => $user->id,
                'activity' => "Posted his/her question."
            ]);
        $this->informUsers($user->id, $post, $request->question);
        return back()->with('message', "Question is posted!");
    }

    public function forum()
    {
        $vote_count = DB::select('((SELECT COUNT(*) as vote_count, comments_id from votes where checked = 1 GROUP BY comments_id) order by vote_count desc limit 1)');
        // $comments = DB::select('SELECT comments.*, users.name, users.image FROM comments INNER JOIN users on comments.users_id = users.id WHERE comments.id ='. $vote_count[0]->comments_id);
        $posts = Queries::with(['users'])->where('is_deleted',0)->get();
        foreach ($posts as $post) {
            $votes = DB::select('((SELECT COUNT(*) as vote_count, comments_id from votes WHERE queries_id = ' . $post->id . ' and checked = 1 GROUP BY comments_id) order by vote_count desc limit 1)');
            $comment_count = DB::select('SELECT COUNT(*) as c FROM comments WHERE queries_id = ' . $post->id);
            if (count($votes) == 0) {
                $post['comments'] = DB::select('SELECT (0) as vote_count, (' . $comment_count[0]->c . ') as comment_count, comments.*, users.name, users.image FROM comments INNER JOIN users ON comments.users_id = users.id WHERE comments.queries_id = ' . $post->id . ' ORDER BY id DESC LIMIT 1');
            } else {
                $post['comments'] = DB::select('SELECT ' . $votes[0]->vote_count . ' as vote_count, (' . $comment_count[0]->c . ') as comment_count, comments.*, users.name, users.image FROM comments INNER JOIN users on comments.users_id = users.id WHERE comments.id = ' . $votes[0]->comments_id);
            }

            $date = $post->query_date;
            $date = Carbon::parse($date);
            $customFormat = $date->format('F j, Y');
            $post['query_date'] = $customFormat;
        }
        // dd($posts);
        $notifs = $this->notifs();
        // dd($posts);
        // dd($posts);
        return view('students.query', ['posts' => $posts, 'open' => 'false', 'see' => 'true', 'notifs' => $notifs]);
    }

    public function viewQuery($id)
    {
        // foreach($posts as $post){
        //     foreach($post->comments as $comment){
        //         $comment['name'] = Users::select('name', 'image')->find($comment->users_id);
        //     }
        // }
        // return view('students.query', ['posts'=>$posts, 'queryId' => $id]);
        $posts = Queries::where('id', $id)->with('users')->get();
        if($posts[0]->is_deleted == 1){
            return redirect('/forum')->with('errmessage', 'This question is deleted.');
        }else{
            $data = Comments::select('comments.*', 'users.name', 'users.image', 'users.id as users_id')
                ->join('users', 'users.id', '=', 'comments.users_id')
                ->where('queries_id', $posts[0]->id)
                ->get();
            foreach ($data as $c) {
                $votes = DB::select('SELECT COUNT(*) as vote_count from votes WHERE comments_id = ' . $c->id . ' and checked = 1 GROUP BY comments_id');
                $c['vote_count'] = ($votes) ? $votes[0]->vote_count : 0;
            }
            $posts[0]['comments'] = $data;
            $notifs = $this->notifs();
            return view('students.query', ['posts' => $posts, 'open' => 'true', 'see' => 'false', 'notifs' => $notifs]);
        }
    }

    public function copyLink($id)
    {
        $data = Posts::where('id', $id)->get();
        if($data[0]->is_deleted == 1){
            session()->flash('errmessage', 'This post is deleted.');
            return redirect('/posts');
        }else{
            $notifs = $this->notifs();
            return view('students.posts', ['posts' => $data, 'notifs' => $notifs]);
        }
    }

    public function news()
    {
        $posts = Posts::where('is_deleted',0)->get();
        $notifs = $this->notifs();
        return view('students.posts', ['posts' => $posts, 'notifs' => $notifs]);
    }

    public function viewProfile($id)
    {
        // $posts = Users::where('id', $id)->with('queries')->get();
        // foreach($posts as $post){
        //     $post['comments'] = Comments::where('queries_id', $post->id)
        //                                     ->join('votes', )
        // }
        $posts = Queries::where('users_id', $id)->with('users')->get();
        foreach ($posts as $post) {
            $post['comments'] = Comments::select('comments.*', 'users.name', 'users.image', 'users.id as users_id')
                ->join('users', 'users.id', '=', 'comments.users_id')
                ->where('queries_id', $post->id)
                ->get();
            foreach ($post->comments as $c) {
                $votes = DB::select('SELECT COUNT(*) as vote_count from votes WHERE comments_id = ' . $c->id . ' and checked = 1 GROUP BY comments_id');
                $c['vote_count'] = ($votes) ? $votes[0]->vote_count : 0;
            }
        }
        $user = Users::find($id);
        $notifs = $this->notifs();
        return view('students.profile', ['posts' => $posts, 'user' => $user, 'see' => 'true', 'notifs' => $notifs]);
    }


    public function show($id)
    {
        #one way of passing data to a page
        // $data = array(
        //     "id" => $id,
        //     "name" => "Hello World",
        //     "age" => 22,
        //     "email" => "hello@gmail.com"
        // );
        // return view('user', $data);

        #another way of passing a data to a page
        $data = ['data' => "Data from database"];
        return view('user')
            ->with('data', $data)
            ->with('name', 'hello w0rld')
            ->with('age', '22')
            ->with('email', 'hello@gmail.com')
            ->with('id', $id);

        // return view('user', ['data' => $data]); // for dd()
    }

    public function update(Request $request)
    {
        // $validated = $request->validate([
        //     "id" => ['required', 'min:10'],
        //     "name" => ['required', 'min:4'],
        //     "email" => ['required', "email"],
        //     "type" => ['required', "email"]
        // ]);

        $user = Users::find(auth()->user()->id);
        // $user->id = $request->id;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->type = $request->type;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg, png, bmp, jpg, tiff | max:5120'
            ]);
            $fileNameWithExtension = $request->file('image');
            $fileName = pathInfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $smallThumbnail = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/student', $fileNameToStore);
            $request->file('image')->storeAs('public/student/thumbnail', $smallThumbnail);

            $thumbnail = 'storage/student/thumbnail/' . $smallThumbnail;
            $this->createThumbnail($thumbnail, 150, 110);
            $user->image = $fileNameToStore;
        }

        $user->update();
        return back()->with('message', 'Data updated successfully.');
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function changepass(Request $request)
    {
        $user = Users::find($request->id);
        if ($user && Hash::check($request->old_password, $user->password)) {
            $validated = $request->validate([
                "old_password" => 'required',
                "password" => 'required|confirmed|min:8'
            ]);
            $validated['password'] = bcrypt($validated['password']);
            $user->password = $validated['password'];
            $res = $user->update();
            if ($res) {
                return back()->with('message', 'Password changed!');
            }
        }
        return back()->with('errmessage', 'Incorrect Password.');
    }

    public function ajaxRequestReact(Request $request)
    {
        $vote = Votes::where('users_id', $request->uid)->where('comments_id', $request->cid)->get(); //get()
        if (count($vote) > 0) {
            $check = $vote[0]->checked == 1 ? 0 : 1;
            DB::table('votes')
                ->where('users_id', $request->uid)
                ->where('comments_id', $request->cid)
                ->update(['checked' => $check]);
            $ret = ($check) ? 'add' : 'minus';
            return $ret;
        } else {
            DB::table('votes')->insert([
                'users_id' => $request->uid,
                'queries_id' => $request->qid,
                'comments_id' => $request->cid
            ]);
            DB::table('activities')->insert([
                'users_id' => $request->uid,
                'activity' => "Reacted on someone's comment"
            ]);
            $user = Users::find($request->uid);
            $c = Comments::find($request->cid);
            DB::table('notifications')->insert([
                'users_id' => $c->users_id,
                'content' => $user->name.' liked your comment: "'.$c->comment.'"',
                'queries_id' => $request->qid,
                //i need the commentor's id, his comment, query id where he commented 
            ]);
            return 'add';
        }
    }

    public function ajaxRequestComment(Request $request)
    {
        DB::table('comments')->insert([
            'users_id' => $request->uid,
            'comment' => $request->comment,
            'queries_id' => $request->qid
        ]);
        DB::table('activities')->insert([
            'users_id' => $request->uid,
            'activity' => "Commented on someone's question"
        ]);
        $qry = Queries::select('users_id', 'query')->where('id', $request->qid)->first();
        DB::table('notifications')->insert([
            'users_id' => $qry->users_id,
            'content' => $request->name . ' commented on your "'.$qry->query.'"',
            'queries_id' => $request->qid,
        ]);
        return 'commented';
    }

    // CALENDAR
    public function calendar(Request $request)
    {
        if ($request->ajax()) {
            $data = Events::where('start', '>=', $request->start)
                ->where('end', '<=', $request->end)
                ->get(['id', 'title', 'description', 'start', 'end']);
            // ['id', 'title', 'start', 'end']
            return response()->json($data);
        }
        $notifs = $this->notifs();
        return view('students.calendar', ['notifs' => $notifs]);
    }

    public function notifs()
    {
        if(auth()->user()){
            $user = auth()->user();
            $notifs = Notifications::where('users_id', $user->id)->orderBy('created_at', 'DESC')->get();
            return $notifs;
        }
        // return view('students.some');
    }

    public function informUsers($id, $query_id, $query){
        $cur = auth()->user()->name;
        $users = Users::where('id', '!=', $id)->orderBy('created_at', 'DESC')->get();
        foreach($users as $user){
            Notifications::insert([
                'users_id' => $user->id,
                'content' => $cur.' posted a question: '.$query,
                'queries_id' => $query_id,
            ]);
        }
    }

    public function readnotifs(Request $request){
            try {
                $id = Notifications::findOrFail($request->id);
                $id->update([
                    'is_read' => 1
                ]);
                return 'updated';
            } catch (ModelNotFoundException $e) {
                return response()->json('no records');
            }
    }

    public function badger(){
        $eligible = false;
        $user = auth()->user();
        $row = Users::find($user->id);
        if($row->trusted == 0){
            $comments = Comments::where('users_id', $user->id)->get();
            if(count($comments) >= 10 ){
                foreach($comments as $comment){
                    $reacts = Votes::where('comments_id', $comment->id)->where('checked', 1)->get();
                    if(count($reacts) < 10){
                        $eligible = false;
                    }else{
                        $eligible = true;
                    }
                }
            }else{
                return '';
            }
            if($eligible){
                $row->update([
                    'trusted' => 1
                ]);
                return 'badger';
            }
        }else{
            return 'trusted';
        }
    }

    public function setAsGuest(){
        Auth::guard(null)->loginUsingId(1, true); // Log in as a "guest" user
        Activities::insert([
            'users_id' => 'none',
            'activity' => 'A Guest logged in.'
        ]);
        return redirect('/about');
    }
}
