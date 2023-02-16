<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Students;
use App\Models\Users;

class DashboardController extends Controller
{
 
    public function getDashboard()
    {
        $student=Students::where('haveTrouble', true)->get();
        return view('simbiling.dashboard.dashboard', compact('student'));
    }
}