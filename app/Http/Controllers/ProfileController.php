<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'new_username' => 'required|string|max:255',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed image types and size as needed
        ]);

        // Handle validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the user's username
        $user = Auth::user();
        $user->username = $request->input('new_username');
        $user->save();

        // Update the user's profile image if provided
        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $profileImagePath = $profileImage->store('profile_images', 'public');
            $user->profile_img = $profileImagePath;
            $user->save();
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
