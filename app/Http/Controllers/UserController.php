<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Users';
        $users = User::all();
        return view('dashboard.users', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add User';
        return view('dashboard.addUser', compact('title'));
    }

    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $messages = $this->errMsg();
    
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ], $messages);

    // Set is_active to false if it's not provided in the request
    $data['is_active'] = $request->has('is_active');

    User::create([
        'name' => $data['name'],
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'is_active' => $data['is_active'],
    ]);

    return redirect()->route('dashboard.users')->with('success', 'User added successfully.');
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
    public function edit(string $id)
    {
        $title = 'Edit User';
        $user = User::findOrFail($id);
        return view('dashboard.editUser', compact('user', 'title'));
    }


    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $messages = $this->errMsg();
    $user = User::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,'.$user->id,
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'password' => 'nullable|string|min:8',
    ], $messages);

    // Only update the password if it's provided in the request
    if ($request->filled('password')) {
        $data['password'] = Hash::make($data['password']);
    } else {
        unset($data['password']); // Remove password from data if not provided
    }

    // Update is_active based on request input
    $data['is_active'] = $request->has('is_active');

    $user->update($data);

    return redirect()->route('dashboard.users')->with('success', 'User updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   /**
 * Return custom error messages for validation.
 */
public function errMsg()
{
    return [
        'name.required' => "The user's name is required.",
        'username.required' => "The username is required.",
        'username.unique' => "The username has already been taken.",
        'email.required' => "The email address is required.",
        'email.email' => "The email must be a valid email address.",
        'email.unique' => "The email address has already been taken.",
        'password.required' => "The password is required.",
    ];
}

}
