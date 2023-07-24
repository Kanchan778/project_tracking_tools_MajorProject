<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Project;
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
        // 
        $projects = DB::table('projects')->get();
        dd($projects);
        $projectStatuses = DB::table('projects')
        ->select(DB::raw('COUNT(*) as total_status, status'))
        ->groupBy('status')
        ->get();
           // Fetch project statuses from the database
           
           
        return view('projectCoordinator.dashboard', compact('user', 'supervisors', 'students', 'defaultImage', 'projectStatuses'));
    }
    
    
    


    //logout
    public function logout()
{
    Session::flush();
    Auth::logout();
    return redirect()->route('login')->with('success', 'You have been logged out.');
}


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