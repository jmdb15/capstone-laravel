<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ExportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
    Route::get('/', [UserController::class, 'about']);
    Route::get('/about', [UserController::class, 'about']);
    Route::get('/forum', [UserController::class, 'forum'])->middleware('auth');
    Route::get('/forum/{id}', [UserController::class, 'viewQuery'])->middleware('auth');
    Route::get('/posts', [UserController::class, 'news'])->middleware('auth');
    Route::get('/post/{id}', [UserController::class, 'copyLink'])->middleware('auth');
    Route::get('/verify', [UserController::class, 'verify']);
    Route::get('/notifications', [UserController::class, 'notifications']);
});
Route::get('/profile/{id}', [UserController::class, 'viewProfile'])->name('profile');

Route::middleware(['guest'])->group(function () {
    // Define routes accessible to guests here
    Route::get('/orgs', [UserController::class, 'orgs']);
    Route::get('/org/{id}', [UserController::class, 'viewOrgs']);
    Route::get('/about', [UserController::class, 'about']);
    Route::get('/faculty', [UserController::class, 'faculty']);
    Route::get('/forum', [UserController::class, 'forum']);
    Route::get('/forum/{id}', [UserController::class, 'viewQuery']);
    Route::get('/posts', [UserController::class, 'news']);
    Route::get('/post/{id}', [UserController::class, 'copyLink']);
});
Route::get('/setAsGuest', [UserController::class, 'setAsGuest'])->name('setAsGuest');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/signup', function () {
    return view('signup');
});

# ### ADMIN PAGES ### #
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin-line', [AdminController::class, 'line']);
    Route::get('/admin-donut', [AdminController::class, 'donut']);
    Route::get('/create-post', [AdminController::class, 'create']);
    Route::post('/create-post/action', [AdminController::class, 'action']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::put('/update-user', [AdminController::class, 'update']);
    Route::get('/admin/forum', [AdminController::class, 'forum']);
    Route::get('/logs', [AdminController::class, 'logs']);
    Route::post('/logs/action', [AdminController::class, 'logsAction']);
    Route::get('/admin/calendar', [CalendarController::class, 'index']);
    Route::post('/calendar/action', [CalendarController::class, 'action']);
    Route::get('/reports', [AdminController::class, 'reports']);
    Route::get('/admin/about', [AdminController::class, 'about']);
    Route::post('/edit-about', [CMSController::class, 'edit']);
    Route::get('/admin/faculty', [AdminController::class, 'faculty']);
    Route::post('/edit-faculty', [CMSController::class, 'update']);
    Route::post('/add-faculty', [CMSController::class, 'store']);
    Route::post('/delete-faculty', [CMSController::class, 'destroy']);
});
Route::post('/forum-modal', [AdminController::class, 'forum_modal']);

# ### PROCESS ### #
Route::post('/create-post/process', [AdminController::class, 'store']);
Route::post('/logs/filtered', [AdminController::class, 'filter']);
Route::get('/calendar', [UserController::class, 'calendar']);
Route::post('/login/process', [UserController::class, 'process']);
Route::post('/store', [UserController::class, 'store']);
Route::put('/update', [UserController::class, 'update']);
Route::put('/changepass', [UserController::class, 'changepass']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/ajax-request-react', [UserController::class, 'ajaxRequestReact']);
Route::post('/ajax-request-comment', [UserController::class, 'ajaxRequestComment']);
Route::post('/go-ask', [UserController::class, 'postQuery']);
Route::get('/process-notifs', [UserController::class, 'notifs'])->middleware('auth');
Route::get('/new-post', [UserController::class, 'getNewPost'])->middleware('auth');
Route::post('/read-notifs', [UserController::class, 'readnotifs'])->middleware('auth');
Route::post('/hide-notifs', [UserController::class, 'hidenotifs'])->middleware('auth');
Route::post('/send-report', [UserController::class, 'report'])->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//FOR EXPORTS
Route::get('/export-events', [ExportController::class, 'exportEvents'])->name('export-events');
Route::get('/export-events-pdf', [ExportController::class, 'exportEventsPdf'])->name('export-events-pdf');
Route::get('/export-users', [ExportController::class, 'exportUsers'])->name('export-users');
Route::get('/export-users-pdf', [ExportController::class, 'exportUsersPdf'])->name('export-users-pdf');
Route::get('/export-logs', [ExportController::class, 'exportLogs'])->name('export-logs');
Route::get('/export-logs-pdf', [ExportController::class, 'exportLogsPdf'])->name('export-logs-pdf');


//Python Connections
Route::get('/edit-cb', [AdminController::class, 'getcbdata']);
Route::get('/update_json', function(Request $request){
    $phpObject = json_decode($request->data);

    $response = Http::post('http://127.0.0.1:5001/update_json',
       $phpObject
    );
    return $response;
});


