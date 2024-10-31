<?php

// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('contact');
    }

    // Handle the contact form submission
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return back()->with('success', 'Your message has been sent successfully!');
    }
    //Fetch Contact us messages
    public function Viewcontact_us_messages()
    {
        // Fetch all contact messages
        $messages = ContactMessage::latest()->paginate(10);

        // Return the view with the messages
        return view('admin.contact', compact('messages'));
    }
}

