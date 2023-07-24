<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
   
        // Logic for student dashboard
        public function index()
{
    // Retrieve the authenticated user (Assuming you are using Laravel's built-in authentication)
    $user = Auth::user();
   
    // Set the default image path
    $defaultImage = 'public/img/Profile.png'    ;

    // Retrieve supervisors and students (assuming 'role' is the field indicating the user's role)
    $students = User::where('role', 'student')->pluck('username');
    $supervisors = User::where('role', 'supervisor')->pluck('username');

    return view('dashboard.student', compact('user', 'supervisors', 'students', 'defaultImage'));
}


//update Profile

public function updatestudentProfile(Request $request)
{
    $request->validate([
        'new_username' => 'required|string|max:255',
        'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Define appropriate validation rules for image upload
        // Add other validation rules for your form fields
    ]);

    // Handle image upload and update the "profile_img" field in the database
    if ($request->hasFile('profile_img')) {
        $imagePath = $request->file('profile_img')->store('avatars', 'public');
        Auth::user()->update(['profile_img' => $imagePath]);
    }

    // Update the user's other profile information
    Auth::user()->update(['username' => $request->input('new_username')]);
    
    // Redirect back with a success message
    return redirect()->route('student.dashboard')->with('success', 'Profile updated successfully.');
}

        
    }

