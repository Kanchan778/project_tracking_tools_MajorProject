<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class StudentProjectController extends Controller
{
    public function index()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();
        $projectsall = Project::all();
        // Retrieve the projects associated with the user
        $projects = $user->projects()->get();
    
        // Retrieve all groups from the Group model
        $groups = Group::all();
    
        // Return the projects, user, and groups to the view
        return view('student.projects', compact('projects', 'user', 'groups','projectsall'));
    }
    
   // Calculate the remaining days
   

}
