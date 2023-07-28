<?php

// app/Http/Controllers/ChangePasswordController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    // Method to display the change password form
    public function showChangePasswordForm()
    {
        return view('layouts.evaluation');
    }

    // Method to handle the change password form submission
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the provided current password matches the user's actual password
        if (Hash::check($request->current_password, $user->password)) {
            // Update the user's password with the new password
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->back()->with('success', 'Password changed successfully!');
        } else {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
    }
}
