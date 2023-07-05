<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectCoordinatorController extends Controller
{
    public function index()
    {
        // Logic for project coordinator dashboard
        // Return the view for the project coordinator dashboard
        return view('dashboard.projectCoordinator');
    }

    //logout
    public function logout()
{
    Session::flush();
    Auth::logout();
    return redirect()->route('login')->with('success', 'You have been logged out.');
}
}