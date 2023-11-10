<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
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
    $data ='{
  "intents": [
    {
      "tag": "greeting",
      "patterns": [
        "Hi",
        "Hey",
        "How are you",
        "Is anyone there?",
        "Hello",
        "Good day"
      ],
      "responses": [
        "Hello, thanks for visiting",
        "Hi there, what can I do for you?",
        "Hi there, how can I help?"
      ]
    },
    {
      "tag": "goodbye",
      "patterns": ["Bye", "See you later", "Goodbye"],
      "responses": [
        "See you later, thanks for visiting",
        "Have a nice day",
        "Bye! Come back again soon."
      ]
    },
    {
      "tag": "thanks",
      "patterns": ["Thanks", "Thank you", "Thats helpful", "Thanks a lot!", "Nice"],
      "responses": ["Happy to help!", "Any time!", "My pleasure"]
    },
    {
      "tag": "programs",
      "patterns": [
        "Which programs are offered within the CSSP?",
        "What academic programs are available within the CSSP?",
        "Could you list the educational programs provided by the CSSP?"
      ],
      "responses": [
        "There are three programs: Bachelor of Science in Social Work, Bachelor of Science in Psychology, and Bachelor in Public Administration"
      ]
    },
    {
      "tag": "community",
      "patterns": [
        "How can I engage with the CSSP community?",
        "What are ways in which I can actively participate in the CSSP community?",
        "How can I become involved with the CSSP community?"
      ],
      "responses": [
        "If you are a guest, simply sign up to become more involved in the community. Then, you can start interacting with other students, whether you have concerns or want to help others. Additionally, you have the opportunity to become a part of any of the organizations, further strengthening your connections with fellow students."
      ]
    },
    {
      "tag": "research",
      "patterns": [
        "How can I contact CSSP faculty members for academic advice or research opportunities?",
        "What is the process for getting in touch with CSSP faculty members regarding academic guidance or potential research collaborations?",
        "How can I reach out to CSSP faculty members for academic guidance or potential research opportunities?"
      ],
      "responses": [
        "You can consider visiting the faculty page to access their contact information."
      ]
    },
    {
      "tag": "scholar",
      "patterns": [
        "Are there scholarships or financial assistance opportunities for students in CSSP, and what is the application process?",
        "Are there any scholarships or financial aid options available to CSSP students, and could you provide details about the application procedure?",
        "Can you share information about the availability of scholarships or financial assistance for CSSP students and outline the steps for applying?"
      ],
      "responses": [
        "As of the present, CSSP does not offer scholarships. However, there are alternative options available outside our department. We recommend contacting the financial aid office at your selected institution for further information"
      ]
    },
    {
      "tag": "facility",
      "patterns": [
        "What facilities and resources, like libraries, laboratories, and study areas, are accessible to students in CSSP?",
        "What facilities and resources, such as libraries, labs, and study spaces, are at the disposal of CSSP students?",
        "What amenities and resources, including libraries, laboratories, and study areas, can CSSP students access?"
      ],
      "responses": [
        "In addition to the universitys e-library, which provides access to research materials and study resources, CSSP Building also offers dedicated areas for students to engage in research and study. Furthermore, some of the study rooms double as laboratories"
      ]
    },
    {
      "tag": "rajah",
      "patterns": [
        "Could you provide information about Rajah?",
        "Could you share some information about Rajah?",
        "Can you offer insights or details about Rajah?"
      ],
      "responses": [
        "Rajah Humabon, also known as Rajah Hamabar, was a historical figure. He was the ruler of the island of Cebu in the Philippines when the Spanish explorer Ferdinand Magellan arrived in 1521. Rajah Humabon is known for his role in the early interactions between the indigenous people of the Philippines and the Spanish explorers during Magellans voyage"
      ]
    },
    {
      "tag": "merch",
      "patterns": [
        "Where can one buy CSSP merchandise?",
        "Where is CSSP merchandise available for purchase?",
        "Where can I find CSSP merchandise for sale?"
      ],
      "responses": [
        "The availability of CSSP merchandise depends on the organization releasing it. To stay informed, you can watch out for upcoming announcements or visit the CSSP Local Student Council for additional details"
      ]
    }
  ]
}';
    
    $phpObject = json_decode($request->data);

    $response = Http::post('http://127.0.0.1:5001/update_json',
       $phpObject
    );

    return $response;
});


