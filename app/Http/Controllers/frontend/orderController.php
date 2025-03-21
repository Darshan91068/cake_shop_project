<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:orders,email',
            'mobile_number' => 'required',
            'user_city' => 'required|string',
            'pincode' => 'required|string|max:10',
            'address' => 'required|string',
            'main_total' => 'required|numeric',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'city' => $request->user_city,
            'pincode' => $request->pincode,
            'address' => $request->address,
            'main_total' => $request->main_total,
        ]);

        return redirect()->route('invoice')->with('success', 'Order placed successfully!');
    }
}
