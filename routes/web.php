<?php


use App\Http\Controllers\ChangePasswordController;
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
use App\Http\Controllers\ProjectCoordinatorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\supervisor\SupervisorProjectController;
use App\Http\Controllers\student\StudentTaskController;
use App\Http\Controllers\cordinator\GroupController;
use App\Http\Controllers\Supervisor\ProgressBarController;
use App\Http\Controllers\Student\InnerGroupController;
use App\Http\Controllers\supervisor\SupervisorGroupController;



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


Route::group(
    [
        'prefix' => 'cordinator',
        'as' => 'projectCoordinator.',
        'middleware' => 'coordinator',
    ],
    function () {
        Route::get('/dashboard', [ProjectCoordinatorController::class, 'index'])->name('dashboard');

        // Route for project.html
        Route::get('/project',  [ProjectController::class, 'index'])->name('project');

        // Route forprojects
        Route::get('/nav-side-project', function () {
            return view('layouts.nav-side-project');
        })->name('nav-side-project');

        // Route for evaluation
        Route::get('/evaluation', function () {
            return view('layouts.evaluation');
        })->name('evaluation');

        // Add the routes for the ProjectController
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
   // Route for creating projects
   Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
   

    // Route for adding supervisors
    Route::post('/supervisors', [ProjectController::class, 'storeSupervisor'])->name('supervisors.store');
 
    // //updating profile
  
    Route::post('/update', [ProjectCoordinatorController::class, 'updateProfile'])->name('profile.update');

    //status
    
    Route::get('/update-status-from-dropdown/{project}/{status}', [ProjectController::class, 'updateStatusFromDropdown'])->name('projects.updateStatusFromDropdown');
 
    //deleting

    Route::delete('/projects/{projectId}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        
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


// //
Route::get('/group', [GroupController::class, 'index'])->name('groups.index');
Route::post('/group/{groupId}/store', [GroupController::class, 'store'])->name('groups.store');

Route::post('/group/{groupId}/storeNote', [GroupController::class, 'storeNote'])->name('groups.storeNote');


Route::get('/get-project-status', [ProjectCoordinatorController::class, 'getProjectStatus']);
//logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    }
);


// routes/web.php


// Route to display the change password form
Route::get('layouts/evaluation', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change-password.form');

// Route to handle the change password form submission
Route::post('layouts/evaluation', [ChangePasswordController::class, 'changePassword'])->name('change-password.submit');




///student

Route::group([
    'prefix' => 'student',
    'as' => 'student.',
    'middleware' => 'student',
], function () {
    Route::get('/dashboard', [DashboardController::class, 'student'])->name('dashboard');
    Route::get('/projects', [StudentProjectController::class, 'index'])->name('projects.index');

    // Add the route for the Group blade
    Route::get('/student/innergroup', [InnerGroupController::class,'index'])->name('student.innergroup');// Add the 'auth' middleware to ensure only authenticated users can access this route
    Route::post('/assign-roles', [InnerGroupController::class,'store'])->name('assign.roles');


    Route::get('student/{projectId}/group', [StudentGroupController::class, 'viewGroup'])->name('student.group');

//update profile
     Route::post('/update', [StudentController::class, 'updatestudentProfile'])->name('profile.update');


     // Route to handle the form submission and store the group
     Route::post('student/{projectId}/group', [StudentGroupController::class, 'store'])->name('group.store');

     Route::get('student/innergroup/{groupId}', [StudentGroupController::class, 'viewGroup'])->name('innergroup');


     Route::post('/innergroup/{groupId}/storeNote', [InnerGroupController::class, 'storeNote'])->name('innergroup.storeNote');

   //
   



    }


);


Route::group(
    [
        'prefix' => 'supervisor',
        'as' => 'supervisor.',
        'middleware' => 'supervisor',
    ],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'supervisor'])->name('dashboard');
    
        //updating profile
        
        Route::post('/update', [SupervisorController::class, 'updatesupervisorProfile'])->name('profile.update');

        //route for projects blade

        // Route for project.html
        Route::get('/projects', [SupervisroProjectController::class, 'index'])->name('projects.index');
        Route::get('/project',  [SupervisorProjectController::class, 'index'])->name('projects');

        //
        Route::get('supervisor/{projectId}/group/{groupId}', [SupervisorGroupController::class, 'viewGroup'])->name('supervisor.group');



// Add a route to handle the form submission for updating progress
Route::get('/progress', [ProgressBarController::class, 'index'])->name('progress');
Route::get('/group', [SupervisorGroupController::class, 'index'])->name('group');

    }
);







//comment
// Route for the index method
Route::get('/pusher', [PusherController::class, 'index']);

// Route for the broadcast method
Route::post('/pusher/broadcast', [PusherController::class, 'broadcast']);

// Route for the receiver method
Route::post('/pusher/receiver', [PusherController::class, 'receiver']);


Route::get('/pusher/chat', 'PusherController@displayChat')->name('chat');

Route::get('Authenticate/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('Authenticate/login', [LoginController::class, 'login'])->name('login.submit');
// Route::post('Authenticate/logout', [LoginController::class, 'logout'])->name('logout');


// For handling the password reset form submission
Route::post('Authenticate/ForgotPassword', 'ResetPasswordController@reset')->name('password-reset');

// For displaying the password reset form
Route::get('Authenticate/ForgotPassword', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password-reset');
