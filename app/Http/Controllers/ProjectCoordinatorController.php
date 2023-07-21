<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project; // Replace "Project" with the actual model class for your projects



class ProjectCoordinatorController extends Controller
{
    public function index()
    {
       // Retrieve the authenticated user (Assuming you are using Laravel's built-in authentication)
    $user = Auth::user();
    // Retrieve supervisors and students (assuming 'role' is the field indicating the user's role)
    $students = User::where('role', 'student')->pluck('username');
    $supervisors = User::where('role', 'supervisor')->pluck('username');
    dd($supervisors);
    return view('dashboard.projectCoordinator', compact('user','supervisors', 'students'));
}
    // Pass the $user variable to the view
    
    


    //logout
    public function logout()
{
    Session::flush();
    Auth::logout();
    return redirect()->route('login')->with('success', 'You have been logged out.');
}

public function updateProjectStatus(Request $request)
{
    $projectId = $request->input('project_id');
    $status = $request->input('status');

    // Retrieve the project by its ID
    $project = Project::findOrFail($projectId);

    // Update the status
    $project->status = $status;
    $project->save();

    return response()->json(['message' => 'Status updated successfully']);
}


}