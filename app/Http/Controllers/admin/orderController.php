<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;
use Yajra\DataTables\Facades\DataTables;

class orderController extends Controller
{
    public function product_list(Request $request)
    {
        // return view('admin.manage_product');
        // $categories = DB::table('categories')->get(); // Fetch categories
        return view('admin.order'); // Pass to view
    }

    // public function store(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'product_category_id' => 'required|exists:categories,id',
    //         'pro_name' => 'required|string|max:255',
    //         'pro_weight' => 'nullable|string|max:255',
    //         'pro_price' => 'required|numeric',
    //         'pro_description' => 'nullable|string',
    //         'pro_discount' => 'nullable|numeric',
    //         'pro_quantity' => 'required|integer',
    //         'pro_image' => 'image',
    //     ]);
    //     // dd($test);

    //     // Handle Image Upload
    //     $imagePath = null;
    //     // Handle file upload
    //     if ($request->hasFile('pro_image')) {
    //         $file = $request->file('pro_image');

    //         // Generate a unique file name using the original file name and timestamp
    //         $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    //         $extension = $file->getClientOriginalExtension();
    //         $timestamp = now()->format('Ymd_His'); // Date and time in format YYYYMMDD_HHMMSS
    //         $uniqueFileName = $originalName . '_' . $timestamp . '.' . $extension;

    //         // Store the file in the public/uploads/category_image directory
    //         $imagePath = $file->storeAs('uploads/products', $uniqueFileName, 'public');
    //     }

    //     // Insert Data into Database
    //     $product = Product::create([
    //         'pro_category_id' => $request->product_category_id, // Ensure this column name matches your database
    //         'pro_name' => $request->pro_name,
    //         'pro_weight' => $request->pro_weight,
    //         'pro_price' => $request->pro_price,
    //         'pro_description' => $request->pro_description,
    //         'pro_discount' => $request->pro_discount,
    //         'pro_quantity' => $request->pro_quantity,
    //         'pro_img' => $imagePath,
    //     ]);

    //     // dd($product);
    //     if ($product) {
    //         return response()->json(['status' => 'success', 'message' => 'Product Added Successfully.']);
    //     } else {
    //         return response()->json(['status' => 'error', 'message' => 'Failed To Add Product.']);
    //     }
    // }

    public function order_list(Request $request)
    {
        // dd("test");
        if ($request->ajax()) {
            $products = Order::orderBy('id','desc')->get();
            return DataTables::of($products)
            ->addIndexColumn()
                ->make(true);
        }
    }
    // public function showUpdateProductForm($product_encodedId)
    // {
    //     try {
    //         // Decode the base64-encoded ID
    //         $decodedId = base64_decode($product_encodedId);

    //         // Validate the ID (ensure it's a number)
    //         if (!is_numeric($decodedId)) {
    //             return response()->json(['error' => 'Invalid product ID'], 400);
    //         }

    //         // Fetch product details
    //         $product = Product::find($decodedId);


    //         if (!$product) {
    //             return response()->json(['error' => 'Product not found'], 404);
    //         }

    //         return response()->json([
    //             'product_id'     => $decodedId,
    //             'pro_category_id'   => $product->pro_category_id,
    //             'pro_name'       => $product->pro_name,
    //             'pro_weight'     => $product->pro_weight,
    //             'pro_price'      => $product->pro_price,
    //             'pro_description' => $product->pro_description,
    //             'pro_discount'   => $product->pro_discount,
    //             'pro_quantity'   => $product->pro_quantity,
    //             'pro_img'      => $product->pro_img
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }
    // public function update(Request $request, $updateproductid)
    // {
    //     try {
    //         // Decode the base64-encoded product ID
    //         $updateproductid_decode = base64_decode($updateproductid);

    //         // Validate the decoded ID (ensure it's numeric)
    //         if (!is_numeric($updateproductid_decode)) {
    //             return response()->json(['error' => 'Invalid product ID'], 400);
    //         }

    //         // Validate request
    //         $request->validate([
    //             'product_category_id' => 'required|exists:categories,id',
    //             'pro_name' => 'required|string|max:255',
    //             'pro_weight' => 'nullable|string|max:255',
    //             'pro_price' => 'required|numeric',
    //             'pro_description' => 'nullable|string',
    //             'pro_discount' => 'nullable|numeric',
    //             'pro_quantity' => 'required|integer',
    //             'pro_image' => 'image|nullable',
    //         ]);

    //         // Find the product
    //         $product = Product::findOrFail($updateproductid_decode);

    //         // Handle image upload if a new image is provided
    //         if ($request->hasFile('pro_image')) {
    //             // Delete the old image if it exists
    //             if ($product->pro_img && Storage::exists("public/{$product->pro_img}")) {
    //                 Storage::delete("public/{$product->pro_img}");
    //             }

    //             // Store new image
    //             $file = $request->file('pro_image');
    //             $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    //             $extension = $file->getClientOriginalExtension();
    //             $uniqueFileName = $originalName . '_' . now()->format('Ymd_His') . '.' . $extension;
    //             $imagePath = $file->storeAs('uploads/products', $uniqueFileName, 'public');

    //             $product->pro_img = $imagePath;
    //         }

    //         // Update product details
    //         $product->update([
    //             'pro_category_id' => $request->product_category_id,
    //             'pro_name' => $request->pro_name,
    //             'pro_weight' => $request->pro_weight,
    //             'pro_price' => $request->pro_price,
    //             'pro_description' => $request->pro_description,
    //             'pro_discount' => $request->pro_discount,
    //             'pro_quantity' => $request->pro_quantity,
    //         ]);

    //         return response()->json(['status' => 'success', 'message' => 'Product Updated Successfully.']);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    // public function destroy($delete_id)
    // {
    //     try {
    //         $productdecode_id = base64_decode($delete_id);
    //         $delete_pro_id = Product::findOrFail($productdecode_id);

    //         if ($delete_pro_id->pro_img && file_exists(public_path('stroage/' . $delete_pro_id->pro_img))) {
    //             unlink(public_path('stroage/' . $delete_pro_id->pro_img));
    //         }

    //         $delete_pro_id->delete();

    //         return response()->json(['success' => true, 'message' => 'Product Deleted Successfully !']);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => false, 'message' => 'Product Not Deleted !']);
    //     }
    // }
}
