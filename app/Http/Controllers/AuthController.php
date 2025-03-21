<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('frontend.login'); // Make sure this is correct
    }

    // Handle login request

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Log the incoming request data for debugging purposes
        Log::info('Login attempt', ['email' => $request->email]);

        // Log any error if authentication fails
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            // return redirect()->intended(session('url.intended', route('cart')))->with('success', 'You have been successfully logged in!');

            return redirect()->route('home')->with('success', 'You have been successfully Login !');
        }

        // Log authentication failure
        Log::error('Login failed', ['email' => $request->email]);

        // Authentication failed
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    // Dashboard view
    public function dashboard()
    {
        return view('frontend.home'); // Create a dashboard view for logged-in users
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        // Redirect to the home page with a flash message
        return redirect()->route('home')->with('logout', 'You have been logged out.');
    }
}
