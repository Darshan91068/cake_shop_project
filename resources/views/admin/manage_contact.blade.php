@extends('admin.layout.main.main_Admin_index')
@section('content')
    {{-- <h1>This is main0</h1> --}}
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Manage Contact</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"
                                class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Contact</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <!-- Add New Button -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">Contact List</h4>
                                {{-- <button id="addNewCategory" class="custom-btn-adds" data-bs-toggle="modal"
                                data-bs-target="#categoryModal">Add Category</button> --}}
                            </div>
                            <!-- DataTable -->
                            <table id="contactTable" class="table table-bordered"
                                style="border:0.8px solid rgb(222, 226, 230);">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="width: 35%">Username</th>
                                        <th style="width: 35%">email</th>
                                        <th style="width: 20%">Subject</th>
                                        <th style="width: 20%">message</th>
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
    @include('admin.layout.components.datatable_script')

    <script>
        // data fetch
        $.noConflict();
        jQuery(document).ready(function($) {
            // fetch dataTable
            function load_data() {
                // Destroy the existing DataTable before reloading
                if ($.fn.dataTable.isDataTable('#contactTable')) {
                    $('#contactTable').DataTable().clear().destroy();
                }
                // Reinitialize DataTable
                $('#contactTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.manage_contact') }}", // Server-side route
                        type: 'GET',
                        dataType: 'json',
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
                        {
                            data: 'subject',
                            name: 'subject'
                        },
                        {
                            data: 'message',
                            name: 'message'
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

            $(document).on('click', '.delete-btn', function() {
                const categoryId = $(this).data('id'); // Get the category ID

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to delete this contact?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/contact/" + categoryId ,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        load_data(); // Refresh data table
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
