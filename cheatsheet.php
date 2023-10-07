<?php
# ### DB QUERYING ### # 

# Select *
// $data = Users::all(); 

# Simple Filter
// $data = Students::where('id', '3')->get();

# LIKE filter
// $data = Students::where('name', 'like', '%le%')->get();

// $ages = Students::where('age', '>=', 19)->orderBy('id', 'desc')->limit(7)->get();

// $cs = DB::table('students')
//             ->select(DB::raw('count(*) as sex_count, sex'))
//             ->groupBy('sex')->get();

// $data = Students::where('id', 100)->firstOrFail()->get();
// $data = Students::findOrFail($id);

# Pass data into a page
// return view('students.index', ['students'=>$data]); 

# Error Handling if View doesnt exist
// if(View::exists('user.create')){
//     return view('user.create');
// }else{
//     return back()->with('message','');
// }


# ### WAYS OF PASSING DATA INTO A PAGE ### #

#one way of passing data to a page
// $data = array(
//     "id" => $id,
//     "name" => "Hello World",
//     "age" => 22,
//     "email" => "hello@gmail.com"
// );
// return view('user', $data);

#another way of passing a data to a page
// $data = ['data' => "Data from database"];
// return view('user')
//         ->with('data', $data)
//         ->with('name', 'hello w0rld')
//         ->with('age', '22')
//         ->with('email', 'hello@gmail.com')
//         ->with('id', $id);

// return view('user', ['data' => $data]); // for dd()


# ### SIGN UP ### #

// $validated = $request->validate([
        // column-name => ['is_it_required?', 'min: chars']
//             "id" => ['required', 'min:10'],
//             "name" => ['required', 'min:4'],
//             "email" => ['required', "email", Rule::unique('users', 'email')], # make sure theres no duplicate
//             "password" => 'required|confirmed|min:8' 
                              # name of confirm_pass MUST BE 'password_confirmation' to confirm
//         ]);

      # ## HASH PASSWORD ## #
// $validated['password'] = Hash::make($validated['password']);
// $validated['password'] = bcrypt($validated['password']);

#create table row
// $user = Users::create($validated);

// $user->login();
// Auth::login($user); # this is better


# ### SIGN IN ### #

// $validated = $request->validate([
//             "email" => ['required', 'email'],
//             "password" => 'required'
//         ]);
// $user = Users::where('email','=',$request->email)->first();
// if($user && Hash::check($request->password, $user->password)){
//     Auth::login($user);
//     if(Auth::check()){
//         return redirect('/');
//     }
// }else{
//     return 'Error';
// }

// if(auth()->attempt($validated)){
//     $request->session()->regenerate();
//     return redirect('/')->with('message', 'Welcome back!');
// }
// return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');

# ### LOG OUT ### #

// auth()->logout();
// $request->session()->invalidate();  
// $request->session()->regenerateToken();


# ### C R U D ### #

#create table row
// $user = Users::create($validated);

#update table row
// public function process(Request $request, Users $user){
//         $validated = $request->validate([
//             "id" => ['required', 'min:10'],
//             "name" => ['required', 'min:4'],
//             "email" => ['required', 'email'],
//             "password" => 'required'
//         ]);

//         $user->update($validated);
//         return back()->with('message','');
// }




$qs = Queries::all();
        $array=[];
        foreach ($qs as $q) {
            array_push($array, Queries::showPost($q->id));
        }
        // $allComments = Comments::get();
        // $users = Users::all();

        // foreach($rootQueries as $query){
        //     $query->name = $users->where('student_number', $query->student_number)->values();
        //     $query->children = $allComments->where('query_id',$query->query_id)->values();
        // }

        return view('students.query', ['queries'=>$array]);
        // $udata = Users::with('queries.comments')->get();
        // $qdata = Queries::with('comments')->get();
        // return view('students.query', ['users'=>$udata, 'queries'=>$qdata]);
?>



<!-- # ### FILTER LOGS ### # -->

        <!-- // $posts = Activities::with('users')->get();
        // foreach($posts as $post){
        //     $post['logged_at'] = Carbon::parse($post->logged_at)->format('F j, Y');
        // }
        // if($request->ajax()){
        //     if($request->date == ''){
        //         $users = Users::where('name', 'like', '%'.$request->text.'%')->has('activities')->with('activities')->get();
        //     }else{
        //         $users = Users::where('name', 'like', '%'.$request->text.'%')->has('activities')->with('activities')->get();
        //         if($users){
        //             $startDate = $request->startdate;
        //             $endDate = $request->enddate;
        //             foreach($users as $user){
        //                 $user->childModel()
        //                     ->where(function ($query) use ($startDate, $endDate) {
        //                         $query->whereBetween('logged_at', [$startDate, $endDate]);
        //                     })
        //                     ->get();
        //             }
        //         }
        //     }
        //     if($users == null){
        //         return response()->json('No users found', 500);
        //     }
        //     return response()->json($users);
        // } -->