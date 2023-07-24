<?php

namespace App\Http\Controllers\Student;

use App\Models\Group;
use App\Models\User;
use App\Models\Role;
use App\Models\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentGroupController extends Controller
{
    public function viewGroup()
    {

 // Assuming you are using Laravel's built-in authentication system
$authUserId = auth()->user()->id;

$projectTypes = Project::distinct('project_type')
    ->where('status', 'active')
    ->whereHas('users', function ($query) use ($authUserId) {
        $query->where('user_id', $authUserId);
    })
    ->pluck('project_type');

// dd($project->project_type);


 // Retrieve usernames of student users attached to the same active project as the authenticated user
 $studentUsernames = User::select('users.username') // Specify the table using alias 'users'
    ->join('project_user', 'users.id', '=', 'project_user.user_id')
    ->whereIn('project_user.project_id', function ($query) use ($authUserId) {
        $query->select('project_id')
            ->from('project_user')
            ->where('user_id', $authUserId);
    })
    ->where('users.role', 'student') // Move the 'where' clause after the 'whereIn' clause
    ->whereIn('project_user.project_id', function ($query) use ($authUserId) { // Add a subquery for the project_ids with active status
        $query->select('project_id')
            ->from('projects')
            ->where('status', 'active')
            ->whereIn('project_id', function ($query) use ($authUserId) {
                $query->select('project_id')
                    ->from('project_user')
                    ->where('user_id', $authUserId);
            });
    })
    ->distinct() // Use the distinct() method to get unique usernames
    ->pluck('users.username'); // Specify the table using alias 'users'



//  dd($projectTypes,$authUserId,$studentUsernames);
 // Pass the data to the view
 return view('student.group', [
     'projectTypes' => $projectTypes,
     'studentUsernames' => $studentUsernames,
 ]);
}

//store group 
public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'project_name' => 'required|string|max:255',
        'project_type' => 'required|string',
        'members' => 'required|array',
        'members.*' => 'integer', // Assuming the member IDs are integers
        'selectedRoles' => 'required|array',
        'selectedRoles.*' => 'string',
        'pitch' => 'string|nullable',
        'visibility' => 'required|string|in:everyone,members,me',
    ]);

    // Create a new Group instance and fill it with the validated data
    $group = new Group();
    $group->group_name = $validatedData['project_name'];
    $group->project_type = $validatedData['project_type'];
    $group->pitch = $validatedData['pitch'];
    $group->visibility = $validatedData['visibility'];

    // Save the group to the database
     dd($group);
    $group->save();

    // Attach users to the group with their respective roles using the sync method
    // Attach users to the group with their respective roles using the sync method
if ($request->has('members')) {
    $members = $validatedData['members'];
    $roles = $validatedData['selectedRoles'];

    // Create an associative array to map users with their roles
    $group->members()->sync($roles);
    $usersWithRoles = [];
    foreach ($members as $index => $memberId) {
        $usersWithRoles[$memberId] = ['role' => $roles[$index]];
    }

    // Attach users and their roles to the group
    $group->users()->sync($usersWithRoles);
}


    // Redirect to a success page or wherever you want after saving the data
    // Redirect to a success page or wherever you want after saving the data
    return redirect()->route('student.group')->with('success', 'Group created successfully.');

}

    }
