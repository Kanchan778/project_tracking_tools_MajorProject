<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->redirectTo = route('home');
    // }

    // public function login()
    // {
    //     return view('ProjectCordinator/index');
    // }

    // Login with Gmail
    public function redirectToGmail()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGmailCallback()
    {
        $user = Socialite::driver('google')->user();
        // Process the user data and log in the user
    }

    // Login with Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // Process the user data and log in the user
    }

    // protected function redirectTo()
    // {
    //     if (auth()->user()->isAdmin()) {
    //         return route('admin.dashboard');
    //     } elseif (auth()->user()->isCustomer()) {
    //         return route('customer.dashboard');
    //     } else {
    //         return route('user.dashboard');
    //     }
    // }
}
