@extends('admin.layout.main.main_Admin_index')
@section('content')
{{-- {{  dd('test'); }} --}}
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Manage Order</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <!-- Add New Button -->
                            {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">Product List</h4>
                                <button id="addNewCategory" class="custom-btn-adds" data-bs-toggle="modal"
                                    data-bs-target="#productModal">Add Product</button>
                            </div> --}}

                            <div class="scroll-container">
                                <!-- DataTable -->
                                <table id="showProduct" class="table table-bordered"
                                    style="border:0.8px solid rgb(222, 226, 230);">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Mobile number</th>
                                            <th>City</th>
                                            <th>Pincode</th>
                                            <th>Address</th>
                                            <th>Total</th>
                                            {{-- <th style="width:10% !important;">Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be populated by DataTables -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Insert Product Modal --}}
    {{-- <div class="modal fade productModal custom-modal-background" id="productModal" tabindex="-1"
        aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px;right: 90px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Category Name</label>
                                <select class="form-control" name="product_category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-lg-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="pro_name" placeholder="Enter product name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Weight</label>
                                <input type="text" class="form-control" name="pro_weight"
                                    placeholder="Enter product weight">
                            </div>
                            <div class="col-md-6 mb-lg-3">
                                <label class="form-label">Product Price</label>
                                <input type="text" class="form-control" name="pro_price"
                                    placeholder="Enter product price">
                            </div>
                            <div class="col-md-6 mb-lg-3">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" name="pro_description" placeholder="Enter product description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Discount</label>
                                <input type="number" class="form-control" name="pro_discount"
                                    placeholder="Enter product discount">
                            </div>
                            <div class="col-md-6 mb-lg-3">
                                <label class="form-label">Product Quantity</label>
                                <input type="number" class="form-control" name="pro_quantity"
                                    placeholder="Enter product quantity">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="pro_image" id="pro_image">
                                <div class="mb-3">
                                    <div id="productimagePreview" class="text-start mt-2">
                                        <img id="product_img" src="#" alt="Image Preview"
                                            style="width: 100px; height: 100px; display: none; object-fit: cover; border: 1px solid #ccc;">
                                    </div>
                                </div>
                            </div>
                            <!-- Image Preview -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="custom-btn-adds">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Update Product Modal --}}
    {{-- <div class="modal fade editproductModal custom-modal-background" id="producteditModal" tabindex="-1"
        aria-labelledby="editproductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px;right: 90px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="editproductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productUpdateForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Category Name</label>
                                <select class="form-control" name="product_category_id" id="edit_product_category_id"
                                    required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="pro_name" id="edit_pro_name"
                                    placeholder="Enter product name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Weight</label>
                                <input type="text" class="form-control" name="pro_weight" id="edit_pro_weight"
                                    placeholder="Enter product weight">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Price</label>
                                <input type="text" class="form-control" name="pro_price" id="edit_pro_price"
                                    placeholder="Enter product price">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" name="pro_description" id="edit_pro_description"
                                    placeholder="Enter product description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Discount</label>
                                <input type="number" class="form-control" name="pro_discount" id="edit_pro_discount"
                                    placeholder="Enter product discount">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Quantity</label>
                                <input type="number" class="form-control" name="pro_quantity" id="edit_pro_quantity"
                                    placeholder="Enter product quantity">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="pro_image" id="edit_product_image">
                                <div class="mb-3">
                                    <div id="productimagePreview" class="text-start mt-2">
                                        <img id="edit_product_img" alt="Image Preview"
                                            style="width: 100px; height: 100px; display: none; object-fit: cover; border: 1px solid #ccc;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="custom-btn-adds">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@include('admin.layout.components.datatable_script')
<script>
    $.noConflict();

    jQuery(document).ready(function($) {
        // function load_data() {
            if ($.fn.DataTable.isDataTable("#showProduct")) {
                $("#showProduct").DataTable().destroy(); // Destroy existing DataTable instance
            }
            $('#showProduct').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.order-show') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'mobile_number',
                        name: 'mobile_number'
                    },
                    {
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'pincode',
                        name: 'pincode'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'main_total',
                        name: 'main_total'
                    },
                ]
            });
        // }
        // load_data();


    //     // //Insert Product Using Ajax

    //     // $("#productForm").on("submit", function(e) {
    //     //     e.preventDefault(); // Prevent default form submission
    //     //     let formData = new FormData(this);
    //     //     $.ajax({
    //     //         url: "{{ route('admin.add_product') }}", // Laravel route
    //     //         type: "POST",
    //     //         data: formData,
    //     //         processData: false,
    //     //         contentType: false,
    //     //         success: function(response) {
    //     //             if (response.status === "success") {
    //     //                 Swal.fire({
    //     //                     title: "Success!",
    //     //                     text: response.message,
    //     //                     icon: "success",
    //     //                     confirmButtonText: "OK"
    //     //                 }).then(() => {
    //     //                     $("#productModal").hide();
    //     //                     $("#productForm")[0]
    //     //                         .reset(); // Reset form after success
    //     //                     load_data();
    //     //                 });
    //     //             } else {
    //     //                 Swal.fire({
    //     //                     title: "Error!",
    //     //                     text: response.message,
    //     //                     icon: "error",
    //     //                     confirmButtonText: "OK"
    //     //                 });
    //     //             }
    //     //         },
    //     //         error: function(xhr) {
    //     //             let errors = xhr.responseJSON.errors;
    //     //             let errorMessages = "";
    //     //             $.each(errors, function(key, value) {
    //     //                 errorMessages += value[0] + "\n";
    //     //             });

    //     //             Swal.fire({
    //     //                 title: "Validation Error!",
    //     //                 text: errorMessages,
    //     //                 icon: "error",
    //     //                 confirmButtonText: "OK"
    //     //             });
    //     //         }
    //     //     });
    //     // });

    //     // //Insert Product Show PreviewImage
    //     // $("#pro_image").on("change", function(event) {
    //     //     var file = event.target.files[0];
    //     //     var preview = $("#product_img");

    //     //     if (file) {
    //     //         var reader = new FileReader();
    //     //         reader.onload = function(e) {
    //     //             preview.attr("src", e.target.result).show();
    //     //         };
    //     //         reader.readAsDataURL(file);
    //     //     } else {
    //     //         preview.attr("src", "#").hide();
    //     //     }
    //     // });


    //     // // Open edit modal and load product data
    //     // jQuery(document).on('click', '.editProductBtn', function() {
    //     //     var encodedProductId = jQuery(this).data('id'); // Get encoded ID

    //     //     jQuery.ajax({
    //     //         url: `/admin/products/${encodedProductId}`,
    //     //         type: "GET",
    //     //         success: function(response) {
    //     //             jQuery("#productUpdateForm").attr("data-id", encodedProductId);
    //     //             // Ensure product data exists
    //     //             if (response.error) {
    //     //                 alert(response.error);
    //     //                 return;
    //     //             }

    //     //             // Fill modal fields
    //     //             jQuery('#edit_product_category_id').val(response.pro_category_id);
    //     //             jQuery('#edit_pro_name').val(response.pro_name);
    //     //             jQuery('#edit_pro_weight').val(response.pro_weight);
    //     //             jQuery('#edit_pro_price').val(response.pro_price);
    //     //             jQuery('#edit_pro_description').val(response.pro_description);
    //     //             jQuery('#edit_pro_discount').val(response.pro_discount);
    //     //             jQuery('#edit_pro_quantity').val(response.pro_quantity);

    //     //             // Show existing image
    //     //             if (response.pro_img) {
    //     //                 var test = jQuery('#edit_product_img')
    //     //                     .attr('src', `/storage/${response.pro_img}`)
    //     //                     .show();
    //     //             } else {
    //     //                 console.log("error");
    //     //                 jQuery('#edit_product_img').hide();
    //     //             }

    //     //             // Show modal
    //     //             jQuery('#producteditModal').modal('show');
    //     //         },
    //     //         error: function(xhr, status, error) {
    //     //             console.log(xhr.responseText); // Debugging: Show error in console
    //     //             alert("Error fetching product data!");
    //     //         }
    //     //     });
    //     // });

    //     // // Change event for image input (delegate to modal)
    //     // jQuery(document).on("change", "#edit_product_image", function(event) {
    //     //     var file = event.target.files[0];
    //     //     var preview = jQuery("#edit_product_img"); // Single image preview

    //     //     if (file) {
    //     //         var reader = new FileReader();
    //     //         reader.onload = function(e) {
    //     //             preview.attr("src", e.target.result)
    //     //                 .show(); // Replace the existing image
    //     //         };
    //     //         reader.readAsDataURL(file);
    //     //     }
    //     // });

    //     // //Update Product
    //     // jQuery(document).on('submit', "#productUpdateForm", function(e) {
    //     //     e.preventDefault();
    //     //     var updateEncodeProductId = jQuery(this).data('id');
    //     //     var updateProductFormData = new FormData(this);
            
    //     //     jQuery.ajax({
    //     //         url: `/admin/updateproduct/${updateEncodeProductId}`, // Fixed backtick issue
    //     //         type: 'POST',
    //     //         data: updateProductFormData,
    //     //         processData: false,
    //     //         contentType: false,
    //     //         success: function(response) {
    //     //             if (response.status === 'success') {
    //     //                 Swal.fire({
    //     //                     title: "Success!",
    //     //                     text: response.message,
    //     //                     icon: "success",
    //     //                     confirmButtonText: "OK"
    //     //                 }).then(() => {
    //     //                     jQuery("#producteditModal").modal('hide');
    //     //                     jQuery("#productForm")[0].reset();
    //     //                     load_data();
    //     //                 });
    //     //             } else {
    //     //                 alert(response.message);
    //     //             }
    //     //         },
    //     //         error: function(xhr) {
    //     //             var errors = xhr.responseJSON.errors;
    //     //             var errorMessage = "Error Updating product";
    //     //             jQuery.each(errors, function(key, value) {
    //     //                 errorMessage += `\n${value}`;
    //     //             });

    //     //             Swal.fire({
    //     //                 title: "Validation Error!",
    //     //                 text: errorMessage,
    //     //                 icon: "error",
    //     //                 confirmButtonText: "OK"
    //     //             });
    //     //         }
    //     //     });

    //     // });

    //     // //Delete Product
    //     // jQuery(document).on('click', '.delete-product', function() {
    //     //     var delete_pro_id = jQuery(this).data('id');
    //     //     var token = jQuery('meta[name="csrf-token"]').attr('content');


    //     //     // Show a confirmation dialog using SweetAlert
    //     //     Swal.fire({
    //     //         title: 'Are you sure?',
    //     //         text: 'Do you want to delete this category?',
    //     //         icon: 'warning',
    //     //         showCancelButton: true,
    //     //         confirmButtonColor: '#d33',
    //     //         cancelButtonColor: '#3085d6',
    //     //         confirmButtonText: 'Yes, delete it!',
    //     //     }).then((result) => {
    //     //         if (result.isConfirmed) {
    //     //             jQuery.ajax({
    //     //                 url: `/admin/productdelete/${delete_pro_id}`,
    //     //                 type: 'DELETE',
    //     //                 data: {
    //     //                     _token: token
    //     //                 },
    //     //                 success: function(response) {
    //     //                     if (response.success) {
    //     //                         Swal.fire({
    //     //                             title: 'Deleted!',
    //     //                             text: response.message,
    //     //                             icon: 'success',
    //     //                             confirmButtonText: 'OK'
    //     //                         }).then((result) => {
    //     //                             // Reload DataTable after clicking OK
    //     //                             if (result.isConfirmed) {
    //     //                                 load_data();
    //     //                             }
    //     //                         });
    //     //                     } else {
    //     //                         Swal.fire('Error!', response.message, 'error');
    //     //                     }
    //     //                 },
    //     //                 error: function(xhr, status, error) {
    //     //                     Swal.fire('Error!',
    //     //                         'An error occurred while deleting the record.',
    //     //                         'error');
    //     //                 },
    //     //             });
    //     //         }
    //     //     })
    //     // });
    });
</script>
