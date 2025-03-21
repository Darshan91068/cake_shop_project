<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class invoiceController extends Controller
{
    public function show()
    {

        // Get the latest order for the logged-in user
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in to view your invoice.');
        }

        $order = Order::where('user_id', $userId)->latest()->first();

        if (!$order) {
            return redirect()->route('home')->with('error', 'No order found.');
        }

        return view("frontend.invoice", compact('order'));
    }
}
