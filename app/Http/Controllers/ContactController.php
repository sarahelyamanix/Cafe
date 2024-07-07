<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // Display the contact form
    public function show()
    {
        return redirect()->route('contactUs')->with('success', 'Your message has been sent!');
        }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Store the data in the database
        Contact::create($validatedData);

        // Send the email
        Mail::to('your_email@example.com')->send(new ContactMail($validatedData));

        // Redirect back with success message
        return redirect()->route('contactUs')->with('success', 'Thank you for reaching out! Your message has been sent!');
    }
}



