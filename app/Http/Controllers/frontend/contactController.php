<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    public function submitForm(Request $request)
    {
        // Debugging - Check incoming request data
        // dd($request->all());

        // Validate the form data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
