<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class StudentTaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Create a new Task instance and fill it with the validated data
        $task = new Task();
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];

        // Save the task to the database
        $task->save();

        // Redirect to a success page or wherever you want after saving the data
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Find the task by ID
        $task = Task::find($id);

        // Update the task with the validated data
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];

        // Save the updated task to the database
        $task->save();

        // Redirect to a success page or wherever you want after updating the data
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the task by ID
        $task = Task::find($id);

        // Delete the task
        $task->delete();

        // Redirect to a success page or wherever you want after deleting the data
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
