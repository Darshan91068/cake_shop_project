<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productDetailController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404, 'Product not found'); // Handle the case where the product is not found
        }
        // Fetch similar products based on the category_id (or any other logic you want to use)
        $similarProducts = Product::all()
            ->take(4); // Limit the number of similar products shown

        return view('frontend.product_detail', compact('product', 'similarProducts'));
    }
}
