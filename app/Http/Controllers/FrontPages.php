<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Beverage;

class FrontPages extends Controller
{
    public function aboutUs()
    {
        $title = 'About Us';
        return view('aboutUs', compact('title'));
    }

    public function contactUs()
    {
        $title = 'Contact Us';
        return view('contactUs', compact('title'));
    }

    public function specialItems()
    {
        $title = 'Special Items';
        $specialItems = Beverage::where('special', true)->get();
        return view('specialItems', compact('specialItems', 'title'));
    }

    public function menu()
    {
        $title = 'Drink Menu';
        // Fetch categories and their associated published beverages (not special)
        $categories = Category::with(['beverages' => function ($query) {
            $query->where('published', true)
                  ->where('special', false);
        }])->get();
    
        return view('menu', compact('categories', 'title'));
    }
    
}
