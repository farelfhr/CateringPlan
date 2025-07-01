<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request and redirect to appropriate dashboard
     */
    public function index()
    {
        $user = auth()->user();
        
        // Check if user has admin role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        // Default redirect to user dashboard
        return redirect()->route('user.dashboard');
    }
}
