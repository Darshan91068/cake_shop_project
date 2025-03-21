<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    {{-- <link href="{{ asset('frontend/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" /> --}}
    <!-- Icon css link -->
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/linearicons/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/flat-icon/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/stroke-icon/style.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="{{ asset('frontend/vendors/revolution/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/revolution/css/layers.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/revolution/css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/animate-css/animate.css') }}" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/magnifc-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendors/nice-select/css/nice-select.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Left Side: Background Image -->
                <div class="col-md-6 d-none d-md-block bg-image">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h1 class="text-white font-weight-bold">Login to Your Account</h1>
                        <p class="text-white">Enter your credentials to access your account and continue where you left
                            off.</p>
                    </div>
                </div>
                <!--  Right Side: Form -->
                <div class="col-md-5 offset-1 mx-auto d-flex align-items-center justify-content-center">
                    <div class="w-75">
                        <h2 class="text-center mb-4">Login</h2>
                        <form class="row contact_us_form" action="{{ route('login.submit') }}" method="POST"
                            id="contactForm">
                            @csrf
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email address">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" placeholder="Enter Your Password"
                                    id="password" name="password" aria-label="Password">
                            </div>
                            <div class="form-group col-md-12 d-flex justify-content-end">
                                <button type="submit" value="submit" class="btn order_s_btn form-control">submit
                                    now</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Don't have an account? <a href="{{ route('registration') }}"
                                    class="text-dark font-weight-bolder">Register now</a></p>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>

    <!-- CSS for Background Image -->
    <style>
        .bg-image {
            background-image: url('{{ asset('frontend/img/home-slider/slider-3.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
    </style>

</body>

</html>
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logi Form</title>
    <link rel="stylesheet" href="{{ asset('forntend/bootstrap-5.3.0/css/bootstrap.min.css') }} ">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .background-main-image {

            background: linear-gradient(to top, rgba(68, 36, 39, 0.4)80%, rgba(68, 36, 39, 0.4)80%),
                url(image/main_login_image.jpg) !important;
            background-size: cover !important;
        }

        .login_heading {
            color: #442427;
        }

        .login_btn {
            border: 1px solid #442427;
        }

        .login_btn:hover {
            color: white;
            background-color: #442427;
        }
    </style>
</head>

<body>

    <section class="vh-100 background-main-image">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem; box-shadow: 1px 1px 20px black;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('forntend/image/login-image.jpeg') }}" alt="login form"
                                    class="img-fluid side-image" style="border-radius: 1rem 0 0 1rem; height: 600px;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-3 p-lg-5 text-black">
                                    <form action="{{ route('login.submit') }}" method="POST">
                                        @csrf
                                        <div class="mb-lg-5 mb-2">
                                            <span class="h1 fw-bold mb-0 login_heading">Login Form</span>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label mt-4" for="form2Example17">Email</label>
                                            <input type="email" id="form2Example17"
                                                class="form-control pt-2 pb-2 @error('email') is-invalid @enderror"
                                                name="email" placeholder="Enter Your Email"
                                                value="{{ old('email') }}" />

                                            <!-- Display validation error message for email -->
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" id="form2Example27"
                                                class="form-control pt-2 pb-2 @error('password') is-invalid @enderror"
                                                name="password" placeholder="Enter Your Password" />

                                            <!-- Display validation error message for password -->
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="pt-1 mb-4">
                                            <input class="btn login_btn btn-lg btn-block" type="submit"
                                                name="login_btn" value="Login">
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="{{ route('registration_page') }}" style="color: #393f81;">Register
                                                here</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script></script>
    <script src="./js/sweetalert2@11.js"></script>

</body>

</html> --}}
