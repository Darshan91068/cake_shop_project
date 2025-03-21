<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  // Add this import
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;  // Add this import for DataTables


class usershowController extends Controller
{
    public function user_list(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'username', 'email', 'phone_number', 'address', 'gender', 'image', 'created_at']);

            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    return '<button class="btn btn-sm btn-danger delete-btn" data-id="' . $user->id . '">
                                <i class="fa fa-trash"></i> 
                            </button>';
                })
                ->editColumn('gender', function ($user) {
                    return ucfirst($user->gender); // Capitalize gender
                })
                ->editColumn('image', function ($user) {
                    // Generate full image URL
                    if ($user->image && file_exists(public_path('storage/' . $user->image))) {
                        $imageUrl = asset('storage/' . $user->image);
                        return '<img src="' . $imageUrl . '" class="img-thumbnail" alt="User Image" width="50">';
                    }
                    return 'No Image';
                })
                ->rawColumns(['action', 'image']) // Allow HTML rendering for action and image columns
                ->make(true);
        }

        return view('admin.user_details');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            // Delete the image if it exists
            if ($user->image) {
                $imagePath = public_path('storage/' . $user->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error deleting user.',
            ]);
        }
    }

}
