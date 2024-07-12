<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashController extends Controller
{
    public function home(){
        $title = 'Home';
        $users = User::all();
        return view('dashboard.users', compact('title', 'users'));
    }
    


    public function login(){
        return view ('.login');
    }
    public function logout(){
        return view ('login');
    }

//     public function menu(){
//         $title = 'Users';
//         $users = User::all();
//         return view('dashboard.users', compact('users', 'title'));
    
// }
}