<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\DashboardController;

// Code using the DashboardController



class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        return view('Authenticate.login');
    }

 /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Check if the input matches either email or username
        $field = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials[$field] = $credentials['username'];
        unset($credentials['username']);

        if (Auth::attempt($credentials)) {
            // Authentication successful

            $user = Auth::user();

            // Redirect users based on their role
            switch ($user->role) {
                case 'student':
                    return redirect()->route('student.dashboard')->with('success', 'You are logged in! Welcome, ' . $user->username);
                case 'supervisor':
                    return redirect()->route('supervisor.dashboard')->with('success', 'You are logged in! Welcome, ' . $user->username);
                case 'project_coordinator':
                    return redirect()->route('projectCoordinator.dashboard')->with('success', 'You are logged in! Welcome, ' . $user->username);
                default:
                    return redirect()->route('home')->with('success', 'You are logged in! Welcome, ' . $user->username);
            }
        } else {
            // Authentication failed
            return back()->withErrors(['message' => 'Invalid credentials. Please try again.']);
        }
    }
//logout method
    public function logout()
{
    Auth::logout();

    return redirect()->route('login');
}
}