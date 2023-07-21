<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthLoginController; // Import the AuthLoginController
use App\Http\Controllers\student\StudentProjectController;
use App\Http\Controllers\Student\StudentGroupController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\cordinator\TaskController;
use App\Http\Controllers\cordinator\FileController;
use App\Http\Controllers\cordinator\SideBarTaskController;
use App\Http\Controllers\ProfileController;

// Route::post('/projects/update-status', 'ProjectCoordinatorController@updateProjectStatus')->name('projectCoordinator.updateStatus');

Route::post('/profile/update', [ProfileController::class,'update'])->name('profile.update');

Route::get('/', function () {
    return view('welcome');
});

Route::get('Authenticate/login', function () {
    return view('Authenticate.login');
})->name('login');

Route::get('Authenticate/registration', function () {
    return view('authenticate.registeration');
})->name('registeration');

Route::post('/register', [RegistrationController::class, 'register'])->name('register');

//comment
// Route for the index method
Route::get('/pusher', [PusherController::class, 'index']);

// Route for the broadcast method
Route::post('/pusher/broadcast', [PusherController::class, 'broadcast']);

// Route for the receiver method
Route::post('/pusher/receiver', [PusherController::class, 'receiver']);


Route::get('/pusher/chat', 'PusherController@displayChat')->name('chat');

Route::get('login/gmail', [AuthLoginController::class, 'redirectToGmail'])->name('login-gmail');
Route::get('login/gmail/callback', [AuthLoginController::class, 'handleGmailCallback']);

Route::get('login/facebook', [AuthLoginController::class, 'redirectToFacebook'])->name('login-facebook');
Route::get('login/facebook/callback', [AuthLoginController::class, 'handleFacebookCallback']);
Route::get('Authenticate/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('Authenticate/login', [LoginController::class, 'login'])->name('login.submit');
// Route::post('Authenticate/logout', [LoginController::class, 'logout'])->name('logout');


// For handling the password reset form submission
Route::post('Authenticate/ForgotPassword', 'ResetPasswordController@reset')->name('password-reset');

// For displaying the password reset form
Route::get('Authenticate/ForgotPassword', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password-reset');


Route::group(
    [
        'prefix' => 'cordinator',
        'as' => 'projectCoordinator.',
        'middleware' => 'coordinator',
    ],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'projectCoordinator'])->name('dashboard');

        // Route for project.html
        Route::get('/project',  [ProjectController::class, 'index'])->name('project');

        // Route for nav-side-project.html
        Route::get('/nav-side-project', function () {
            return view('layouts.nav-side-project');
        })->name('nav-side-project');

        // Route for nav-side-task.html
        Route::get('/nav-side-task', function () {
            return view('layouts.nav-side-task');
        })->name('nav-side-task');

        // Route for nav-side-kanban-board.html
        Route::get('/nav-side-kanban-board', function () {
            return view('layouts.nav-side-kanban-board');
        })->name('nav-side-kanban-board');

        // Add the routes for the ProjectController
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
   // Route for creating projects
   Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
   

    // Route for adding supervisors
    Route::post('/supervisors', [ProjectController::class, 'storeSupervisor'])->name('supervisors.store');
 
    //updating profile
    Route::post('/profile/update', [ProjectController::class, 'update'])->name('profile.update');

    //status
    Route::get('/update-status/{project}', [ProjectController::class, 'updateStatus'])->name('projects.updateStatus');
    //deleting
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        
    // Route to show tasks for a specific project
// Route::get('/sidebar-task/{projectId}', [TaskController::class, 'showTasksForProject']);


Route::get('layouts/nav-side-project/{projectId}', [TaskController::class, 'showProject'])->name('nav-side-project.task');


//file 
Route::post('/projects/{projectId}/files', [FileController::class,'store'])->name('project.files');
//deastroy
Route::delete('/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');

//storing data for tasks
Route::post('/projects/{projectId}/tasks', [TaskController::class, 'createTask'])->name('project.createTask');

//sidebartask route
Route::get('/sidebartask', [SideBarTaskController::class, 'viewSidebarTask'])->name('sidebartask');

//logout

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    }
);


///student

Route::group([
    'prefix' => 'student',
    'as' => 'student.',
    'middleware' => 'student',
], function () {
    Route::get('/dashboard', [DashboardController::class, 'student'])->name('dashboard');
    Route::get('/projects', [StudentProjectController::class, 'index'])->name('projects.index');

    // Add the route for the Group blade

Route::get('/group', [StudentGroupController::class, 'viewGroup'])->name('student.group');

});


Route::group(
    [
        'prefix' => 'supervisor',
        'as' => 'supervisor.',
        'middleware' => 'supervisor',
    ],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'supervisor'])->name('dashboard');
    
        
    }
);


