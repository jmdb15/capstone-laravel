<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

# ### STUDENT PAGES ### #
Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/about', [UserController::class, 'about']);
    Route::get('/orgs', function () {
        return view('students.organization');
    });
    Route::get('/forum', [UserController::class, 'forum'])->middleware('auth');
    Route::get('/forum/{id}', [UserController::class, 'viewQuery'])->middleware('auth');
    Route::get('/profile/{id}', [UserController::class, 'viewProfile'])->middleware('auth');
    Route::get('/posts', [UserController::class, 'news'])->middleware('auth');
    Route::get('/post/{id}', [UserController::class, 'copyLink'])->middleware('auth');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/signup', function () {
    return view('signup');
})->middleware('guest');

# ### ADMIN PAGES ### #
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/create-post', [AdminController::class, 'create']);
    Route::post('/create-post/process', [AdminController::class, 'store']);
    Route::post('/create-post/action', [AdminController::class, 'action']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/admin/forum', [AdminController::class, 'forum']);
    Route::get('/logs', [AdminController::class, 'logs']);
    Route::get('/admin/calendar', [CalendarController::class, 'index']);
    Route::post('/admin/calendar/action', [CalendarController::class, 'action']);
});

# ### PROCESS ### #
Route::post('/logs/filtered', [AdminController::class, 'filter']);
Route::get('/calendar', [UserController::class, 'calendar'])->middleware('auth');
Route::post('/login/process', [UserController::class, 'process']);
Route::post('/store', [UserController::class, 'store']);
Route::put('/update', [UserController::class, 'update']);
Route::put('/changepass', [UserController::class, 'changepass']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/ajax-request-react', [UserController::class, 'ajaxRequestReact']);
Route::post('/ajax-request-comment', [UserController::class, 'ajaxRequestComment']);
Route::post('/go-ask', [UserController::class, 'postQuery']);
Route::get('/process-notifs', [UserController::class, 'notifs'])->middleware('auth');





// Route::get('/', function(){
//     return view('welcome');
// });

// Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth');//protect routes
// Route::get('/login', function(){ return view('login'); })->name('login');
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/user/{id}', [UserController::class, 'show']);
// Route::get('/signup', function(){ return view('signup'); });

// Route::get('/home', function () {
//     return 'welcome home';
// });
// Route::get('/users', function(Request $request){
//     dd($request);
//     return null;
// });

// Route::get('/user/{id}/{grp}', function($id, $grp){
//     return response($id.'-'.$grp, 200)->header('Content-type', 'text/plain');
// });

// Route::get('/request-json', function(){
//     return response()->json(['name' => 'Hello', 'age' => '22']);
// });

// Route::get('/request-dl', function(){
//     $path = public_path().'/sample.txt';
//     $name = 'sample.txt';
//     $header = array(
//         'Content-type : application/text-plain',
//     );
//     return response()->download($path, $name, $header);
// });