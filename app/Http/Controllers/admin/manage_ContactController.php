<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class manage_ContactController extends Controller
{
    public function contact_list(Request $request)
    {

        if ($request->ajax()) {
            $contact = Contact::select('id', 'username', 'email', 'subject', 'message');
            return DataTables::of($contact)
                ->addColumn('action', function ($contact) {
                    return '<button class="btn btn-sm btn-danger delete-btn" data-id="' . base64_encode($contact->id) . '">
                        <i class="fa fa-trash"></i>
                    </button>';
                })
                ->rawColumns(['action', 'category_image']) // Allow HTML rendering for action and image columns
                ->make(true);
        }

        return view('admin.manage_contact');
    }
    public function destroy($delete_id)
    {
        try {
            $productdecode_id = base64_decode($delete_id);
            $delete_pro_id = Contact::findOrFail($productdecode_id);

            $delete_pro_id->delete();

            return response()->json(['success' => true, 'message' => 'Contact Deleted Successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Contact Not Deleted!']);
        }
    }
}
