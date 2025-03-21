<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class checkoutController extends Controller
{
    public function processCheckout(Request $request)
    {
        // Debugging: Check the incoming request data
        // \Log::info('Request Data: ', $request->all());

        if (!$request->has('products') || !$request->has('grand_total')) {
            return response()->json(['message' => 'Invalid request data'], 400);
        }

        $user_id = Auth::id(); // Get logged-in user ID
        $products = $request->input('products'); // Get product details
        $grand_total = floatval($request->input('grand_total')); // Ensure it's a valid float

        if (empty($products)) {
            return response()->json(['message' => 'Cart is empty!'], 400);
        }
        // Extract product names
        $productNames = [];
        foreach ($products as $product) {
            $productNames[] = $product['pro_name']; // Add product name to the array
        }
        // dd($products);
        // Store checkout data in session
        session()->put('checkout_data', [
            'user_id' => $user_id,
            'products' => $products,
            'grand_total' => $grand_total,
            // 'product_names' => $productNames // Store product names separately

        ]);
        // Debugging: Check if session data is being set
        // \Log::info('Session Data: ', session()->get('checkout_data'));
        Cart::where('user_id', $user_id)->delete();
        return response()->json([
            'message' => 'Checkout successful!',
            'redirect_url' => url('/chekout') // Change this URL to your actual checkout page
        ]);
    }
}
