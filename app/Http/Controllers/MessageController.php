<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index()
    {
        $title = 'Messages';
        $contacts = Contact::all();
        return view('dashboard.messages', compact('contacts', 'title'));
    }

    public function show($id)
    {
        $title = 'Messages';
        $contact = Contact::find($id);
        return view('dashboard.showMessage', compact('contact', 'title'));
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('indexMessages')->with('success', 'Message is deleted successfully');
    }
}
