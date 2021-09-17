<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //set the view to the home page
    public function index() {
        return view('Home');
    }
}
