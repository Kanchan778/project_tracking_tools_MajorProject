<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class StudentProjectController extends Controller
{
    public function index()
{
    $user = Auth::user(); // Retrieve the currently authenticated user
    $projects = $user->projects; // Retrieve the projects associated with the user

    // Loop through the projects and access their attributes
    // foreach ($projects as $project) {
    //     echo $project->name; // Example attribute, adjust it based on your project model attributes
    // }
    $projectsall = Project::all();
    //  dd($projectsall);


    // Return the projects and user to the view
    return view('student.projects', compact('projects', 'projectsall','user'));
}


   // Calculate the remaining days
   

}
