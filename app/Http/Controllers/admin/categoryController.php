<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\category;
use Yajra\DataTables\Facades\DataTables;  // Add this import for DataTables

class categoryController extends Controller
{

    public function category_list(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::select('id', 'category_name', 'category_description', 'category_image');
            return DataTables::of($categories)
                ->addColumn('action', function ($category) {
                    return '
                    <button class="btn btn-sm btn-warning edit-btn"
                        data-id="' . $category->id . '"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="' . $category->id . '">
                        <i class="fa fa-trash"></i>
                    </button>';
                })

                ->editColumn('category_image', function ($category) {
                    // Construct the correct public path for the image
                    if ($category->category_image && file_exists(public_path('storage/' . $category->category_image))) {
                        $imageUrl = asset('storage/' . $category->category_image);
                        return '<img src="' . $imageUrl . '" class="img-thumbnail" alt="Category Image" style="width: 99% !important;height: 130px !important;">';
                    }
                    return 'No Image';
                })
                ->rawColumns(['action', 'category_image']) // Allow HTML rendering for action and image columns
                ->make(true);
        }

        return view('admin.manage_category');
    }


    public function store(Request $request)
    {
        try {
            // Validate the input data
            $validation = Validator::make($request->all(), [
                'category_name' => 'required|string|max:255',
                'category_description' => 'required|string',
                'category_image' => 'required', // Validate as image
            ]);

            if ($validation->fails()) {
                return response()->json(['errors' => $validation->errors()->all()]);
            }

            $imagePath = null;

            // Handle file upload
            if ($request->hasFile('category_image')) {
                $file = $request->file('category_image');

                // Generate a unique file name using the original file name and timestamp
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $timestamp = now()->format('Ymd_His'); // Date and time in format YYYYMMDD_HHMMSS
                $uniqueFileName = $originalName . '_' . $timestamp . '.' . $extension;

                // Store the file in the public/uploads/category_image directory
                $imagePath = $file->storeAs('uploads/category_image', $uniqueFileName, 'public');
            }

            // Save the category in the database
            \App\Models\Category::create([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'category_image' => $imagePath,
            ]);

            return response()->json(['success' => true, 'message' => 'Category added successfully!']);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error storing category: ' . $e->getMessage());

            // Return a generic error message
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }

    public function show($id)
    {
        $category = Category::find($id);

        if ($category) {
            return response()->json(['success' => true, 'data' => $category]);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_description' => 'nullable|string',
            'category_image' => 'nullable|image',
        ]);

        $category = Category::find($id);

        if ($category) {
            $category->category_name = $request->category_name;
            $category->category_description = $request->category_description;

            if ($request->hasFile('category_image')) {
                $imagePath = $request->file('category_image')->store('category_images', 'public');
                $category->category_image = $imagePath;
            }
            $category->save();
            return response()->json(['success' => true, 'message' => 'Category Updated Successfully']);
        }
        return response()->json(['error' => false, 'message' => 'Category Not Found'], 400);
    }


    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);

            // Delete the category image if it exists
            if ($category->category_image && file_exists(public_path('storage/' . $category->category_image))) {
                unlink(public_path('storage/' . $category->category_image));
            }

            $category->delete();

            // Return a success response with a message
            return response()->json(['success' => true, 'message' => 'Category deleted successfully!']);
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error deleting category. Please try again.'], 500);
        }
    }
}
