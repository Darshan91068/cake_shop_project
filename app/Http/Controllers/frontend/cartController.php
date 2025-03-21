<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    // Function to add product to cart
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You must be logged in to add items to the cart.'
            ]);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_qty' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'product_price' => $product->pro_price,
            'product_qty' => $request->product_qty,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart!',
            'cart_count' => Cart::where('user_id', Auth::id())->count()
        ]);
    }



    // Function to get cart count
    public function cartCount()
    {
        if (!Auth::check()) {
            return response()->json(['cart_count' => 0]);
        }

        return response()->json([
            'cart_count' => Cart::where('user_id', Auth::id())->count(),
        ]);
    }
}
