<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password',
        ]);

        // Create a new user record
        $user = new User();
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

       
        // Optionally, you can log in the user after registration
        // auth()->login($user);

        // Redirect the user to a success page or perform any other desired action
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:student',
        ]);
    }
    
    
}
