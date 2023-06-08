<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use Laravel\Socialite\Facades\Socialite;

// ProjectCordinator
use App\Http\Controllers\ProjectCordinatorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

Route::get('/', function () {
    return view('welcome');
});
 //route to login page after 10 sec from splash screen
Route::get('Authenticate/login', function () {
    
    return view('authenticate.login');
})->name('login');

// route to registration page when clicked create accont button
Route::get('Authenticate/registeration', function () {
    return view('authenticate.registeration');
})->name('registeration');

//route to facebook and login

Route::get('login/gmail', [LoginController::class, 'redirectToGmail'])->name('login-gmail');
Route::get('login/gmail/callback', [LoginController::class, 'handleGmailCallback']);

Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login-facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
