<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class DashboardController extends Controller
{
 
    public function getDashboard()
    {
        return view('admin.dashboard');
    }
}