<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
{
    $con = Contact::all();
    return view('dashboard.topNav', compact('con'));
}


    public function markAsRead($id)
    {
        $msg = Contact::findOrFail($id);
        $msg->read = true;
        $msg->save();

        return redirect()->back();
    }
}
