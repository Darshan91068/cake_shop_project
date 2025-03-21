<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Cake Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}  " />
    <!-- End layout styles -->
    <style>
        .login_font {
            font-size: 17px !important;
        }
    </style>
</head>

<body>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="{{ asset('admin/images/logo.svg') }}" />
                            </div>
                            <!-- <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6> -->
                            <form id="loginForm" method="POST" action="{{ route('admin.login.submit') }}">
                                @csrf <div class="form-group pt-3">
                                    <label for="" class="login_font">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Enter Admin Email" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="login_font">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter Admin Password" />
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @if (session('logout_message'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Removed',
                text: "{{ session('logout_message') }}",
                confirmButtonText: 'OK'
            });
        </script>
    @endif


    <script src="{{ asset('admin/js/custom.js') }} "></script>
    <script src=" {{ asset('admin/../admin/../js/sweetalert2@11.js') }} "></script>
</body>

</html>
