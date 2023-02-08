<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Content;

class HomeController extends Controller
{
 
    public function getHome()
    {
        $home=Content::where('contentFor', 'home')->first();
        return view('simbiling.home.home', compact('home'));
    }
}