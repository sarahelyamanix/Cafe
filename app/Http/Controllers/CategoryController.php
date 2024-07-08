<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $title = 'Categories';
        $categories = Category::all();
        return view('dashboard.categories', compact('categories', 'title'));
    }

    public function create()
    {
        $title = 'Add Categories';
        return view('dashboard.addCategory', compact('title'));
    }

    public function store(Request $request)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ], $messages);

        Category::create($data);
        return redirect()->route('dashboard.categories')->with('success', 'Category added successfully.');
    }

    public function edit(string $id)
    {
        $title = 'Edit Categories';
        $category = Category::findOrFail($id);
        return view('dashboard.editCategory', compact('category', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $category = Category::findOrFail($id);
    
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ], $messages);
    
        $category->update($data);
    
        return redirect()->route('dashboard.categories')->with('success', 'Category updated successfully.');
    }
    

    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);

        // Temporarily commenting out the beverages check since the table doesn't exist yet
        // if ($category->beverages()->count() > 0) {
        //     return redirect()->route('dashboard.categories')->with('error', 'Category cannot be deleted because it has associated beverages.');
        // }

        $category->delete();

        return redirect()->route('dashboard.categories')->with('success', 'Category deleted successfully.');
    }
    
    public function errMsg(){
        return [
            'name.required' => "The Category's name is missing, Please insert it.",
        ];
    }
}
