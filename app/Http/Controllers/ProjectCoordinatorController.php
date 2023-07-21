<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Project; // Replace "Project" with the actual model class for your projects



class ProjectCoordinatorController extends Controller
{
    public function index()
    {
       // Retrieve the authenticated user (Assuming you are using Laravel's built-in authentication)
    $user = Auth::user();

    // Pass the $user variable to the view
    return view('dashboard.projectCoordinator', compact('user'));
    }
    


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