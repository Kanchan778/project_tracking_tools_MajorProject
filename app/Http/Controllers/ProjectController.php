<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\PojectUser;

class ProjectController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'student') {
            // Retrieve the projects assigned to the current student
            $projects = $user->projects;
        } elseif ($user->role === 'supervisor') {
            // Retrieve the projects supervised by the current supervisor
            $projects = Project::where('supervisor_id', $user->id)->get();
        } else {
            // Retrieve all projects for other roles (e.g., project coordinator)
            $projects = Project::all();
        }


        // Calculate the remaining days for each project
    $projects->each(function ($project) {
        $currentDate = Carbon::now()->startOfDay();
        $dueDate = Carbon::parse($project->due_date)->startOfDay();
        $remainingDays = $currentDate->diffInDays($dueDate);
        $project->remainingDays = $remainingDays;
    });

        // Fetch the semesters and sections from the User table
        $semesters = User::distinct('semester')->pluck('semester');
        $sections = User::distinct('section')->pluck('section');

        // Fetch the supervisors from the User table who have the Supervisor role
        $supervisors = User::where('role', 'Supervisor')->get();

        return view('layouts.project', compact('projects', 'semesters', 'sections', 'supervisors', 'user'));
   }

    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'project_name' => 'required',
        'section' => 'required',
        'semester' => 'required',
        'course' => 'required',
        'project_type' => 'required',
        'batch' => 'required',
        'supervisor' => 'required|array',
        'start_date' => 'required|date',
        'due_date' => 'required|date',
        'visibility' => 'required|in:everyone,members,me',
    ]);


    // Create a new Project instance
    $project = new Project;
    $project->project_name = $validatedData['project_name'];
    $project->section = implode(',', $validatedData['section']);
    $project->semester = $validatedData['semester'];
    $project->course = $validatedData['course'];
    $project->project_type = $validatedData['project_type'];
    $project->batch = $validatedData['batch'];
    $project->supervisor = implode(',', $validatedData['supervisor']);
    $project->start_date = $validatedData['start_date'];
    $project->due_date = $validatedData['due_date'];
    $project->visibility = $validatedData['visibility'];

    
     
    //dd($validatedData);
    // Save the project data to the database
    $project->save();
    

    // Calculate the remaining days
    $currentDate = Carbon::now()->startOfDay();
    $dueDate = Carbon::parse($validatedData['due_date'])->startOfDay();
    $remainingDays = $currentDate->diffInDays($dueDate);
    // dd($remainingDays);

    // Attach the remainingDays property to the newly created project
    $project->remainingDays = $remainingDays;

  // Retrieve the supervisors matching the usernames in the project
  // Retrieve the supervisors matching the selected usernames
  $supervisors = User::whereIn('username', $validatedData['supervisor'])
  ->where('role', 'supervisor')
  ->get();

//   $supervisors = User::where('user_id',$validatedData['supervisor'])
//    ->where
$students = User::where('semester', $validatedData['semester'])
    ->whereIn('section', $validatedData['section'])
    ->get();

// Get the student IDs and usernames
$studentIds = $students->pluck('id')->toArray();
$studentUsernames = $students->pluck('username')->toArray();

// Create an array to store the student data for attachment
$studentData = [];

// Prepare the student data for attachment
foreach ($studentIds as $index => $studentId) {
    $studentData[$studentId] = [
        'user_type' => 'student',
        'username' => $studentUsernames[$index],
    ];
}

// Attach students to the project with their user type, username, and role
$project->users()->attach($studentData);
     // Redirect to a success page or return a response
    return redirect()
        ->back()
        ->with('success', 'Project created successfully!')
        ->with('projects', Project::all()); 
}




//adding supervisor
public function storeSupervisor(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'department' => 'required',
        ]);

        // Create a new User instance
        $user = new User;
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        $user->password = bcrypt($validatedData['password']);
        $user->department = $validatedData['department'];
        $user->role = 'supervisor'; // Set the role as 'supervisor'

        // Save the user data to the database
        $user->save();

        // Optionally, you can redirect the user to a success page or perform other actions

        return redirect()->back()->with('success', 'Supervisor added successfully.');
    }


//for edit button
    public function update(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'username' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();

        // Update the user details
        $user->username = $validatedData['username'];

        // Handle profile image upload if provided
        if ($request->hasFile('profile_image')) {
            // Delete the old profile image if exists
            Storage::delete($user->profile_image);

            // Store the new profile image
            $path = $request->file('profile_image')->store('profile_images');
            $user->profile_image = $path;
        }

        // Save the updated user details
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


//status update
public function updateStatus(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'project_id' => 'required|exists:projects,id', // Ensure project_id exists in the projects table
        'status' => 'required|in:Active,In Evaluation,Completed', // The status should be one of these values
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422); // Return the validation errors with status code 422 (Unprocessable Entity)
    }

    // If validation passes, proceed to update the project status
    $projectId = $request->input('project_id');
    $status = $request->input('status');
dd($status);
    // Update the project status in the database 
    $project = Project::find($projectId);
    if (!$project) {
        // Project not found, return an error response
        return response()->json(['error' => 'Project not found'], 404);
    }

    // saving status in database
    $project->status = $status;
    $project->save();

    // Status updated successfully, return a success response
    return response()->json(['message' => 'Status updated successfully']);
}
}

