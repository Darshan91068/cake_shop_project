<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class showCartProductController extends Controller
{
    public function index(Request $request)
    {
        // Fetch cart items for the logged-in user
        if ($request->ajax()) {

            $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
            // Assuming you're sending the cartItems as a response
            return response()->json([
                'cartItems' => $cartItems->map(function ($item) {
                    return [
                        'product' => [
                            'pro_img' => asset('storage') . '/' . $item->product->pro_img, // just the relative path
                            'pro_name' => $item->product->pro_name,
                            'product_price' => $item->product->pro_price, // Assuming the price is available in the 'price' column
                        ],
                        'product_qty' => $item->product_qty, // Assuming qty is stored in the cart
                        'id' => $item->id, // Cart item ID
                    ];
                })
            ]);
        }

        return view('frontend.cart');
    }
    public function remove($id)
    {
        // Find the cart item
        $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json([
                'success' => true,
                'decoded_id' => $id,
                'message' => 'Item removed successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Item not found'
        ]);
    }
}