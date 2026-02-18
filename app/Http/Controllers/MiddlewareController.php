<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareController extends Controller
{
    public function Student(){
        return view('student');
    }

    public function Admin(){
        return view('dashboard');
    }
    public function banner(){
        return view('banner');
    }
}
