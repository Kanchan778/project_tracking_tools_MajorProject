<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProjectController;
//use App\Http\Controllers\ProjectCoordinatorController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('Authenticate/login', function () {
    return view('Authenticate.login');
})->name('login');

Route::get('Authenticate/registration', function () {
    return view('authenticate.registeration');
})->name('registeration');

Route::get('login/gmail', [AuthLoginController::class, 'redirectToGmail'])->name('login-gmail');
Route::get('login/gmail/callback', [AuthLoginController::class, 'handleGmailCallback']);

Route::get('login/facebook', [AuthLoginController::class, 'redirectToFacebook'])->name('login-facebook');
Route::get('login/facebook/callback', [AuthLoginController::class, 'handleFacebookCallback']);

Route::post('/register', [RegistrationController::class, 'register'])->name('register');

//route to dashboard based on their role
Route::get('/dashboard/student', [DashboardController::class, 'student'])->name('student.dashboard');
Route::get('/dashboard/supervisor', [DashboardController::class, 'supervisor'])->name('supervisor.dashboard');
Route::get('/dashboard/projectCoordinator', [DashboardController::class, 'projectCoordinator'])->name('projectCoordinator.dashboard');

Route::get('Authenticate/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('Authenticate/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('Authenticate/logout', [LoginController::class, 'logout'])->name('logout');

// For handling the password reset form submission
Route::post('Authenticate/ForgotPassword', 'ResetPasswordController@reset')->name('password-reset');

// For displaying the password reset form
Route::get('Authenticate/ForgotPassword', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password-reset');
//Route::get('Authenticate/password-reset', '\App\Http\Controllers\Auth\ForgotPasswordController@showResetForm')->name('password-reset');

// routes for displaying projects
Route::get('cordinator/Project', 'App\Http\Controllers\ProjectController@index')->name('Project');
//route for creating project and storing
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store')

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
//fetching username for dashboard sidebar profile
Route::get('/fetch-username', 'UserController@fetchUsername');


//routes for displaying group
Route::get('Student/Group', 'App\Http\Controllers\GroupController@index')->name('Group');


//managing suprvisor from project cordinator
Route::get('cordinator/supervisors', 'cordinatorSupervisorController@index')->name('Supervisor');
Route::get('cordinator/supervisors/create', 'cordinatorSupervisorController@create')->name('SupervisorCreate');
Route::get('cordinator/supervisors/{id}/edit', 'cordinatorSupervisorController@edit')->name('SupervisorEdit');
Route::post('cordinator/supervisors', 'cordinatorSupervisorController@store')->name('SupervisorStore');
Route::put('cordinator/supervisors/{id}', 'cordinatorSupervisorController@update')->name('SupervisorUpdate');
Route::delete('cordinator/supervisors/{id}', 'cordinatorSupervisorController@destroy')->name('SupervisorDestroy');

//logout
Route::get('/logout', [ProjectCordinatorController::class, 'logout'])->name('logout');