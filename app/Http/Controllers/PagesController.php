<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //Page Controller
    
    public function home()
    {
    	return view('home');
    }
    public function about()
    {
    	return view('pages.about');
    }
}
