<?php


namespace App\Http\Controllers\cordinator;
// use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{



    public function showFile($projectId)
    {
        //retreive all project data from project id
        $project = Project::findOrFail($projectId);
        
        //retreive tasks data
        $files = File::where('project_id', $projectId)->get();
        $files = $project->files;
        // dd($project);
        return view('layouts.nav-side-project', compact('project','files'));
    }
    
    

// ...

public function store(Request $request, $projectId)
{
    $file = $request->file('file');

    // Save the uploaded file and get the file path
    $filePath = $file->store('uploads');

    // Create a new File instance and set the attributes
    $fileModel = new File([
        'project_id' => $projectId,
        'filename' => $file->getClientOriginalName(),
        'file_path' => $filePath,
        'file_type' => $file->getClientMimeType(),
        'updated_at' => now(),
        'created_at' => now(),
    ]);

    // Save the file details to the database
    $fileModel->save();

    // Optionally, you can add some logic here to handle other form data fields

    // Redirect back with success message or any other response
    return redirect()->back()->with('success', 'File uploaded successfully.');
}

//destroy
public function destroy(File $file)
{
    // Delete the file from the storage
    Storage::delete($file->file_path);

    // Delete the file record from the database
    $file->delete();

    // Optionally, you can add some logic here to handle success or error messages

    // Redirect back with success message or any other response
    return redirect()->back()->with('success', 'File deleted successfully.');
}

}
