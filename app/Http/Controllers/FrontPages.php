<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPages extends Controller
{
    public function aboutUs(){
        $title = 'About Us';
        return view('aboutUs', compact('title'));
    }
    public function contactUs(){
        $title = 'Contact Us';
            return view('contactUs', compact('title'));
    }
    public function specialItems(){
    $title = 'Special Items';
            return view('specialItems', compact('title'));
    }
    // public function index(){
    //     $title = 'Home';
    //     return view('index', compact('title'));
    // }
    public function menu(){
        $title = 'Drink Menu';
        return view('menu', compact('title'));
    }
    
}
