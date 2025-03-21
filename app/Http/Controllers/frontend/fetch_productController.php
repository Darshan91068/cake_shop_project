<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class fetch_productController extends Controller
{
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the data to the view
        return view('frontend.index', compact('products'));
    }
    public function fetch_our_cakes()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the data to the view
        return view('frontend.our_cakes', compact('products'));
    }
}
