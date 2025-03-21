<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAdminForm()
    {
        return view('admin.login');
    }

    /**
     * Handle the admin login request.
     */
    public function login(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the admin in
        if (
            Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $request->remember)
        ) {
            session()->flash('login_message', 'You Have Been SuccessFully Logged In.');
            return redirect()->route('admin.index');
        }
        // If login fails, return with error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email', 'remember'));
    }


    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        return view('admin.index');
    }
    /**
     * Log out the admin.
     */
    public function adminlogout(Request $request)
    {
        Auth::logout(); // Logs out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        // Redirect to login with a success message
        return redirect('admin/login')->with('logout_message', 'You have been successfully logged out.');
    }
}
