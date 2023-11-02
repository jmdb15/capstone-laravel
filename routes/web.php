<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/aboutt', [UserController::class, 'notifs']);
    Route::get('/orgs', function () {
        return view('students.organization');
    });
    Route::get('/forum', [UserController::class, 'forum'])->middleware('auth');
    Route::get('/forum/{id}', [UserController::class, 'viewQuery'])->middleware('auth');
    Route::get('/posts', [UserController::class, 'news'])->middleware('auth');
    Route::get('/post/{id}', [UserController::class, 'copyLink'])->middleware('auth');
});
Route::get('/profile/{id}', [UserController::class, 'viewProfile'])->name('profile');

Route::middleware(['guest'])->group(function () {
    // Define routes accessible to guests here
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
Route::get('/verify', [UserController::class, 'verify']);

# ### ADMIN PAGES ### #
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin-line', [AdminController::class, 'line']);
    Route::get('/create-post', [AdminController::class, 'create']);
    Route::post('/create-post/action', [AdminController::class, 'action']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::put('/update-user', [AdminController::class, 'update']);
    Route::get('/admin/forum', [AdminController::class, 'forum']);
    Route::get('/logs', [AdminController::class, 'logs']);
    Route::post('/logs/action', [AdminController::class, 'logsAction']);
    Route::get('/admin/calendar', [CalendarController::class, 'index']);
    Route::post('/calendar/action', [CalendarController::class, 'action']);
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
Route::post('/read-notifs', [UserController::class, 'readnotifs'])->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
