<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class usercontroller extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|confirmed',    
        ]);

        // Create a new user record
        User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash the password
        ]);

        // Redirect to a success page or return a response
        return redirect()->route('login')->with('success', 'User Registration successfully!');
    }
}
