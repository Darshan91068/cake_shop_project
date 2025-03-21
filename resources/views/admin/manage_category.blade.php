@extends('admin.layout.main.main_Admin_index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Manage Category</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"
                                class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <!-- Add New Button -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">Category List</h4>
                                <button id="addNewCategory" class="custom-btn-adds" data-bs-toggle="modal"
                                    data-bs-target="#categoryModal">Add Category</button>
                            </div>
                            <!-- DataTable -->
                            <table id="categoryTable" class="table table-bordered"
                                style="border:0.8px solid rgb(222, 226, 230);">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="width: 35%">Category Name</th>
                                        <th style="width: 35%">Description</th>
                                        <th style="width: 20%">Image</th>
                                        <th style="width:10% !important;">Actions</th>
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
    <div class="modal fade categoryModal custom-modal-background" id="categoryModal" tabindex="-1"
        aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="right: -58px;top:24px;">
            <div class="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.add_category') }}" enctype="multipart/form-data"
                            id="categoryForm">
                            @csrf
                            <!-- Category Name -->
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="category_name"
                                    placeholder="Enter category name">
                                @error('category_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="categoryDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="categoryDescription" name="category_description" rows="3"
                                    placeholder="Enter description"></textarea>
                                @error('category_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Image -->
                            <div class="mb-3">
                                <label for="categoryImage" class="form-label">Image</label>
                                <input type="file" accept="image/*" class="form-control" id="imgInp"
                                    name="category_image">
                                @error('category_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Image Preview -->
                            <div class="mb-3">
                                {{-- <label for="imagePreview" class="form-label">Image Preview</label> --}}
                                <div id="imagePreview" class="text-center">
                                    <img id="blah" src="#" alt="Image Preview"
                                        style="width: 100px; height: 100px; display: none; object-fit: cover; border: 1px solid #ccc;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="custom-btn-adds" data-bs-dismiss="modal" value="Add Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- edit form  --}}
    <div class="modal fade custom-modal-background" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="right: -58px;top:24px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.category.update', '') }}" enctype="multipart/form-data"
                        id="edit_categoryForm">
                        @csrf
                        @method('PUT')
                        <!-- Category Name -->
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category
                                Name</label>
                            <input type="text" class="form-control" id="edit_categoryName" name="category_name"
                                placeholder="Enter category name">
                            @error('category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" id="edit_categoryId" name="category_id">
                        <!-- Description -->
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Category Description</label>
                            <textarea class="form-control" id="edit_categoryDescription" name="category_description" rows="3"
                                placeholder="Enter Category description"></textarea>
                            @error('category_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="edit_categoryImage" class="form-label">Category Image</label>
                            <input type="file" accept="image/*" class="form-control" id="edit_imgInp"
                                name="category_image">
                            @error('category_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Image Preview -->
                        <div class="mb-3 ">
                            <img id="edit_blah" src="#" alt="Image Preview"
                                style="width: 100px; height: 100px; display: none; object-fit: cover; border: 1px solid #ccc;">
                        </div>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" >Close</button> --}}
                    <input type="submit" class="custom-btn-adds" data-bs-dismiss="modal" value="Edit Category">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.components.datatable_script')

    <script>
        // data fetch
        $.noConflict();
        jQuery(document).ready(function($) {
            // fetch dataTable
            function load_data() {
                // Destroy the existing DataTable before reloading
                if ($.fn.dataTable.isDataTable('#categoryTable')) {
                    $('#categoryTable').DataTable().clear().destroy();
                }
                // Reinitialize DataTable
                $('#categoryTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.manage_category') }}", // Server-side route
                        type: 'GET',
                        dataType: 'json',
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'category_name',
                            name: 'category_name'
                        },
                        {
                            data: 'category_description',
                            name: 'category_description'
                        },
                        {
                            data: 'category_image',
                            name: 'category_image'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                });
            }
            load_data();

            // ajax insert
            $('#categoryForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission
                // Create a FormData object
                var formData = new FormData();
                formData.append('category_name', $('#categoryName').val());
                formData.append('category_description', $('#categoryDescription').val());
                var imageFile = $('#imgInp')[0].files[0];

                if (imageFile) {
                    formData.append('category_image', imageFile); // Append the image file
                }

                formData.append('_token', $('meta[name="csrf-token"]').attr(
                    'content')); // Append CSRF token

                // Send AJAX request with FormData
                $.ajax({
                    url: "{{ route('admin.add_category') }}",
                    type: "POST",
                    data: formData,
                    processData: false, // Prevent jQuery from processing data
                    contentType: false, // Prevent jQuery from setting content type
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Category added successfully!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Refresh data
                                load_data();
                                // Reset the form fields explicitly
                                $('#categoryName').val(''); // Clear category name
                                $('#categoryDescription').val(''); // Clear description
                                $('#imgInp').val(''); // Clear file input

                                // Clear the image preview
                                const blah = document.getElementById('blah');
                                blah.src = '#';
                                blah.style.display = 'none';
                            });
                        } else if (response.errors) {
                            let errors = response.errors.join('\n');
                            Swal.fire({
                                title: 'Error',
                                text: "Errors:\n" + errors,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error',
                            text: "An error occurred: " + error,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
            // delete button 
            $(document).on('click', '.delete-btn', function() {
                const categoryId = $(this).data('id'); // Get the category ID

                // Show a confirmation dialog using SweetAlert
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this category?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send AJAX request to delete the record
                        $.ajax({
                            url: `/admin/category/${categoryId}`, // API endpoint
                            type: 'DELETE',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr(
                                    'content'), // CSRF token
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        // Reload DataTable after clicking OK
                                        if (result.isConfirmed) {
                                            load_data();
                                        }
                                    });
                                } else {
                                    Swal.fire('Error!', response.message, 'error');
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('Error!',
                                    'An error occurred while deleting the record.',
                                    'error');
                            },
                        });
                    }
                });
            });

            // Fetch Category Data
            $(document).on("click", ".edit-btn", function() {
                const categoryId = $(this).data("id");

                $.ajax({
                    url: "{{ url('admin/category') }}/" + categoryId,
                    method: "GET",
                    success: function(response) {
                        if (response) {
                            $('#edit_categoryId').val(response.data.id);
                            $('#edit_categoryName').val(response.data.category_name);
                            $('#edit_categoryDescription').val(response.data
                                .category_description);

                            if (response.data.category_image) {
                                $('#edit_blah').attr('src', "{{ asset('/storage/') }}" + '/' +
                                    response.data.category_image).show();
                            } else {
                                $('#edit_blah').attr('src', '').hide(); // Hide if no image
                            }
                        } else {
                            alert('Error fetching category data.');
                        }
                    },
                    error: function() {
                        alert('Failed to fetch category');
                    },
                });
            });

            // Image Preview on Selecting New Image
            $('#edit_imgInp').on('change', function(event) {
                const file = event.target.files[0];
                const preview = $('#edit_blah');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.attr('src', e.target.result).show();
                    };

                    reader.readAsDataURL(file);
                } else {
                    preview.attr('src', '').hide();
                }
            });

            //Update Data
            $('#edit_categoryForm').on('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.category.update', '') }}" + '/' + $('#edit_categoryId')
                        .val(),
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Category Updated successfully!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Refresh data
                                load_data();
                            });
                        } else if (response.errors) {
                            let errors = response.errors.join('\n');
                            Swal.fire({
                                title: 'Error',
                                text: "Errors:\n" + errors,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function() {
                        alert('Failed to update category.');
                    }
                });
            });
        });
    </script>
    <!-- insert image preview -->
    <script>
        document.getElementById('imgInp').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('blah');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
@endsection
