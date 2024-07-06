<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function home(){
        return view ('dashboard.users');
    }


    public function login(){
        return view ('dashboard.login');
    }
}
