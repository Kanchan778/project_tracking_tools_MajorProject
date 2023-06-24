<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyAuthenticatedSessionController;

class AuthenticatedSessionController extends FortifyAuthenticatedSessionController
{
    protected function authenticated(Request $request, $user)
    {
        // Check user role and redirect accordingly
        if ($user->hasRole('project coordinator')) {
            return redirect()->route('dashboard.project_coordinator');
        } elseif ($user->hasRole('student')) {
            return redirect()->route('dashboard.student');
        } else {
            // Redirect to a default dashboard or homepage for other roles
            return redirect()->route('dashboard.default');
        }
    }
}
