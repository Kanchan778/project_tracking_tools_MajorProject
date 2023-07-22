<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;// Replace "Project" with the actual model class for your projects



class ProjectCoordinatorController extends Controller
{
    
public function index()
{
    // Retrieve the authenticated user (Assuming you are using Laravel's built-in authentication)
    $user = Auth::user();
   
    // Set the default image path
    $defaultImage = '/path/to/default/Profile.png';

    // Retrieve supervisors and students (assuming 'role' is the field indicating the user's role)
    $students = User::where('role', 'student')->pluck('username');
    $supervisors = User::where('role', 'supervisor')->pluck('username');

    return view('dashboard.projectCoordinator', compact('user', 'supervisors', 'students', 'defaultImage'));
}

    
    


    //logout
    public function logout()
{
    Session::flush();
    Auth::logout();
    return redirect()->route('login')->with('success', 'You have been logged out.');
}

// public function updateProjectStatus(Request $request)
// {
//     $projectId = $request->input('project_id');
//     $status = $request->input('status');

//     // Retrieve the project by its ID
//     $project = Project::findOrFail($projectId);

//     // Update the status
//     $project->status = $status;
//     $project->save();

//     return response()->json(['message' => 'Status updated successfully']);
// }


//update Profile

public function updateProfile(Request $request)
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
    return redirect()->route('projectCoordinator.dashboard')->with('success', 'Profile updated successfully.');
}



}