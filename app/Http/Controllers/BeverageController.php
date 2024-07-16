<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beverage;
use App\Models\Category;
use App\Traits\UploadFile;

class BeverageController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Beverages';
        $beverages = Beverage::all();
        return view('dashboard.beverages', compact('beverages', 'title'));
    }

    public function create()
    {
        $title = 'Add Beverages';
        $categories = Category::all();
        return view('dashboard.addBeverage', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $messages = $this->errMsg();
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'price' => 'required|numeric',
        // 'published' => 'boolean',
        // 'special' => 'boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
    ], $messages);

    $data['published'] = $request->has('published');
    $data['special'] = $request->has('special');
    
    // Handle the image upload

    $fileName = $this->upload($request->image, 'assets/images');
    $data['image'] = $fileName;


    Beverage::create($data);

    return redirect()->route('dashboard.beverages')->with('success', 'Beverage added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beverage $beverage)
    {
        $title = 'Edit Beverages';
        $categories = Category::all();
        return view('dashboard.editBeverage', compact('beverage', 'categories', 'title'));
    }

    public function update(Request $request, Beverage $beverage)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'price' => 'required|numeric',
        'published' => 'boolean',
        'special' => 'boolean',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Handle image upload

        if ($request->hasFile('image')) {
            $fileName = $this->upload($request->image, 'assets/images');
            $data['image'] = $fileName;
        } else {
            $data['image'] = $beverage->image;
        }

    // Explicitly cast the checkboxes to boolean
    $data['published'] = $request->boolean('published');
    $data['special'] = $request->boolean('special');

    $beverage->update($data);

    return redirect()->route('dashboard.beverages')->with('success', 'Beverage updated successfully');
}


    public function destroy(Request $request)
    {
        // if ($beverage->image) {
        //     unlink(public_path('assets/images').'/'.$beverage->image);
        // }
        $id = $request->id;
        Beverage::destroy($id);

        // $beverage->delete();
        return redirect()->route('dashboard.beverages')->with('success', 'Beverage deleted successfully.');
    }

    public function errMsg()
    {
        return [
            'title.required' => "The beverage title is required.",
            'content.required' => "The beverage content is required.",
            'price.required' => "The beverage price is required.",
            'price.numeric' => "The price must be a numeric value.",
            'image.required' => "The beverage image is required.",
            'image.image' => "The uploaded file must be an image.",
            'category_id.required' => "The beverage category is required.",
            'category_id.exists' => "The selected category does not exist.",
        ];
    }
}