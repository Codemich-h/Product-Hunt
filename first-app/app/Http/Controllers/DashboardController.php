<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard Route
    public function dashboard() {
        
    }

    public function showDashboard()
    {
        return view('layouts.dashboard');   
    }
}
