<?php

namespace App\Http\Controllers\Student;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use App\Models\Role;
use App\Models\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StudentGroupController extends Controller
{
    // StudentGroupController.php

    public function viewGroup($projectId)
{
    // Assuming you are using Laravel's built-in authentication system
    $authUserId = auth()->user()->id;
    $project = Project::with('group','users')->find($projectId);
    $group = Group::with('users')->where('project_id', $projectId)->first();
    // $hasActiveProjects = $project->where('status', 'active')->isNotEmpty();
    // dd($hasActiveProjects);
    // $myGroup = GroupUser::with('group')->where('group_id', $groupId)->where('user_id', Auth::id())->first();
    
// dd($myGroup);
    $projectTypes = Project::distinct('project_type')
        ->where('status', 'active')
        ->whereHas('users', function ($query) use ($authUserId) {
            $query->where('user_id', $authUserId);
        })
        ->pluck('project_type');

    // Retrieve usernames of student users attached to the same active project as the authenticated user
    $studentUsernames = User::select('username')
        ->whereIn('id', function ($query) use ($authUserId) {
            $query->select('user_id')
                ->from('project_user')
                ->where('project_id', $authUserId);
        })
        ->where('role', 'student') // Move the 'where' clause after the 'whereIn' clause
        ->whereIn('id', function ($query) use ($authUserId) { // Add a subquery for the project_ids with active status
            $query->select('user_id')
                ->from('project_user')
                ->where('project_id', $authUserId)
                ->whereIn('project_id', function ($query) {
                    $query->select('project_id')
                        ->from('projects')
                        ->where('status', 'active');
                });
        })
        ->distinct() // Use the distinct() method to get unique usernames
        ->pluck('username');
// dd($studentUsernames );
    // Retrieve the groups attached to the user
    $userGroups = Group::whereHas('users', function ($query) use ($authUserId) {
        $query->where('user_id', $authUserId);
    })->get();

    

    
    // Check if the current user is already part of a group
    $isInGroup = $userGroups->count() > 0;
    // dd($isInGroup);
    // $project->load('group');
    // $userGroups->load('users');
    
    // if (!$project->groups || !$userGroups) {
    //     // Handle the case when the relationships are not properly loaded
    //     // For example, you can return an empty array or an error message, or load the relationships manually.
    //     // For simplicity, let's assume that if the relationships are not loaded, we return an empty array.
    //     return [];
    // }
    
    //filter username who is in group
// $filteredUsernames = $studentUsernames->filter(function ($username) use ($project, $userGroups) {
//     // Check if the username is not in any group associated with the project and the current user is not already in a group
//     return !$project->groups->pluck('users')->flatten()->pluck('username')->contains($username) && !$userGroups->pluck('users')->flatten()->pluck('username')->contains($username);
// });

    // Pass the data to the view
    return view('student.group', [
        'project' => $project,
        'projectTypes' => $projectTypes,
        'studentUsernames' => $studentUsernames,
        'userGroups' => $userGroups,
        'isInGroup' => $isInGroup,
    
        'group' =>$group ,
        'users',
        'username',
       
    ]);
}


    
//store group 
public function store(Request $request,$projectId)
{
    try {
        //return $request->all();
        Log::info('Form Data:', $request->all());
        // Get the current authenticated student/user
        $currentUser = auth()->user();

        // Check if the current user is already part of a group
        $isInGroup = GroupUser::where('user_id', $currentUser->id)->exists();

        if ($isInGroup) {
            return redirect()->back()->with('error', 'You are already part of a group and cannot create a new one.');
        }

        // Validate the form data
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_type' => 'required|string',
            'selectedUsernames' => 'required|array',
            'selectedUsernames.*' => 'string',
            'pitch' => 'string|nullable',
            'visibility' => 'required|string|in:everyone,members,me',
        ]);

        // Create a new Group instance and fill it with the validated data
        $group = new Group();
        $group->project_id = $projectId;
        $group->group_name = $validatedData['project_name'];
        $group->project_type = $validatedData['project_type'];
        $group->pitch = $validatedData['pitch'];
        $group->visibility = $validatedData['visibility'];

        // Save the group to the database
        $group->save();

        // Retrieve user IDs based on selected usernames
        // $userIds = User::whereIn('username', $validatedData['selectedUsernames'])->pluck('id')->toArray();

        // Attach users to the group using the attach method
        $group->users()->attach($validatedData['selectedUsernames']);
        // Redirect to a success page or wherever you want after saving the data
        return redirect()->route('student.group')->with('success', 'Group created successfully.');
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error creating group: ' . $e->getMessage());

        // Redirect back to the form with an error message
        return redirect()->back()->with('error', 'An error occurred while creating the group.');
    }
}
}