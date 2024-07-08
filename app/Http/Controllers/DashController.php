<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function home(){
        $title = 'Home';
        return view ('dashboard.users', compact('title'));
    }


    public function login(){
        return view ('dashboard.login');
    }
}
