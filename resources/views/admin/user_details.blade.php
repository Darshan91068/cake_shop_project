@extends('admin.layout.main.main_admin_index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">User Details</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Details</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <table id="userTable" class="table table-bordered"
                                style="border:0.8px solid rgb(222, 226, 230);">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        {{-- <th>Phone Number</th> --}}
                                        {{-- <th>Address</th>
                                        <th>Gender</th> --}}
                                        {{-- <th>Profile Image</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be populated dynamically by DataTables -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.components.datatable_script')
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            // Initialize DataTable
            let userTable = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.user_details') }}", // Route for server-side data
                    type: 'GET', // Use GET for fetching data
                    dataType: 'json',
                    error: function(xhr, status, error) {
                        console.error('DataTables AJAX Error:', error);
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    // {
                    //     data: 'phone_number',
                    //     name: 'phone_number'
                    // },
                    // {
                    //     data: 'address',
                    //     name: 'address'
                    // },
                    // {
                    //     data: 'gender',
                    //     name: 'gender'
                    // },
                    // {
                    //     data: 'profile_image',
                    //     name: 'profile_image',
                    //     render: function(data) {
                    //         return data

                    //     }
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                error: function(xhr, status, error) {
                    console.error("Error loading DataTable:", error);
                }
            });

            // Delete user handler
            $(document).on('click', '.delete-btn', function() {
                let userId = $(this).data('id');
                let url = "{{ route('users.destroy', ':id') }}".replace(':id',
                    userId); // Replace :id dynamically

                // if (confirm('Are you sure you want to delete this user?')) {
                //     $.ajax({
                //         url: url,
                //         type: 'POST',
                //         data: {
                //             _method: 'DELETE', // Laravel method override
                //             _token: '{{ csrf_token() }}' // Include CSRF token
                //         },
                //         success: function(response) {
                //             if (response.success) {
                //                 Swal.fire({
                //                     icon: 'success', // Display a success icon
                //                     title: 'Deleted!',
                //                     text: response.message, // Show the response message
                //                     confirmButtonText: 'OK'
                //                 }).then(() => {
                //                     // Reload DataTable after the SweetAlert is closed
                //                     $('#userTable').DataTable().ajax.reload();
                //                 });
                //             } else {
                //                 Swal.fire({
                //                     icon: 'error',
                //                     title: 'Error',
                //                     text: response.message ||
                //                         'An error occurred while deleting the user.',
                //                 });
                //             }

                //         },
                //         error: function(xhr) {
                //             console.error('Error during deletion:', xhr.responseText);
                //             alert('An error occurred: ' + (xhr.responseJSON?.message || xhr
                //                 .responseText));
                //         }
                //     });
                // }

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this User ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send AJAX request to delete the record
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _method: 'DELETE', // Laravel method override
                                _token: '{{ csrf_token() }}' // Include CSRF token
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
                                            // load_data();
                                            $('#userTable').DataTable().ajax
                                                .reload();

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
        });
    </script>
@endsection
