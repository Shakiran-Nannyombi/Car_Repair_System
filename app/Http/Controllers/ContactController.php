<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Process the form data (e.g., save to database, send email, etc.)
        // For now, just return a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
