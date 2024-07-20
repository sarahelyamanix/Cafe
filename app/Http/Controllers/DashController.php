<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Carbon\Carbon;

class DashController extends Controller
{
    public function home()
    {
        $title = 'Home';
        $users = User::all();
        $contacts = Contact::all();
        return view('dashboard.users', compact('title', 'users', 'contacts'));
    }



    public function login(){
        return view ('.login');
    }
    public function logout(){
        return view ('login');
    }

    // public function index()
    // {
    //     $title = 'Messages';
    //     $contacts = Contact::all();
    //     return view('dashboard.messages', compact('contacts', 'title'));
    // }
//     public function menu(){
//         $title = 'Users';
//         $users = User::all();
//         return view('dashboard.users', compact('users', 'title'));
    
// }
}