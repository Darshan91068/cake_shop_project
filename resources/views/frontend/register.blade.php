<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
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
                <!-- Left Side: Form -->
                <div class="col-md-5 offset-1 mx-auto d-flex align-items-center justify-content-center">
                    <div class="w-75">
                        <h2 class="text-center mb-4">Registration</h2>


                        <form class="row contact_us_form" action="{{ route('register.store') }}" method="POST"
                            id="contactForm">
                            @csrf
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="name" name="username"
                                    placeholder="Enter Your Username" value="{{ old('username') }}">
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email address" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" placeholder="Enter Your Password"
                                    id="password" name="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" placeholder="Enter Your Confirm Password"
                                    id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn order_s_btn form-control">Submit Now</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                                    class="text-dark font-weight-bolder">Login in</a></p>
                        </form>
                    </div>
                </div>

                <!-- Right Side: Background Image -->
                <div class="col-md-6 d-none d-md-block bg-image">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h1 class="text-white font-weight-bold">Welcome!</h1>
                        <p class="text-white">Create a new account to unlock exclusive features and start your journey
                            today.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
            });
        </script>
    @endif


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

</html>{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('forntend/bootstrap-5.3.0/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .background-main-image {

            background: linear-gradient(to top, rgba(68, 36, 39, 0.4)80%, rgba(68, 36, 39, 0.4)80%),
                url(image/main_login_image.jpg) !important;
            background-size: cover !important;
            height: 765px !important;

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

        .background-main-image {
            background: linear-gradient(to top, rgba(68, 36, 39, 0.4)80%, rgba(68, 36, 39, 0.4)80%),
                url(image/main_login_image.jpg) !important;
            background-size: cover !important;
            height: 742px;
        }

        .side-image {
            width: 93%;
            height: 658px !important;
        }

        .card-body {
            padding-right: 50px !important;
        }

        .select_image {
            height: 100px !important;
            width: 100px;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
        }
    </style>
</head>


<body>

    <section class="background-main-image">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center 100vh">
                <div class="col col-xl-10 m-4">
                    <div class="card" style="border-radius: 1rem; box-shadow: 1px 1px 20px black;">
                        <div class="row g-0 ">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('forntend/image/login-image.jpeg') }}" alt="login form"
                                    class="img-fluid side-image" style="border-radius: 1rem 0 0 1rem; height: 600px;" />
                            </div>
                            <div class="col-md-6 col-lg-7 mt-4 d-flex ">
                                <div class="card-body text-black">
                                    <form action="{{ route('register.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-1">
                                            <span class="h1 fw-bold mb-0 login_heading">Registration Form</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-outline mb-4">
                                                    <label class="form-label mt-4" for="form2Example17">Username</label>
                                                    <input type="text" id="form2Example17"
                                                        class="form-control pt-2 pb-2 @error('username') is-invalid @enderror"
                                                        name="username" placeholder="Enter Your Username"
                                                        value="{{ old('username') }}" />
                                                    @error('username')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-outline">
                                                    <label class="form-label mt-4" for="email">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control pt-2 pb-2 @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}" 
                                                        placeholder="Enter Your Email" />
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" name="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                         pattern=".{6,}" placeholder="Enter your password"
                                                        title="Six or more characters">
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                                    <input type="tel" id="phoneNumber" name="phone_number"
                                                        class="form-control @error('phone_number') is-invalid @enderror"
                                                         pattern=".{10,}" placeholder="Enter your Phone Number"
                                                        title="Enter 10 Digit" />
                                                    @error('phone_number')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="address">Address</label>
                                                    <textarea class="form-control @error('address') is-invalid @enderror" type="text" name="address" >{{ old('address') }}</textarea>
                                                    @error('address')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <p class="mb-2 pb-1">Gender </p>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('gender') is-invalid @enderror"
                                                            type="radio" name="gender" value="male" checked />
                                                        <label class="form-check-label" for="maleGender">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('gender') is-invalid @enderror"
                                                            type="radio" name="gender" value="female" />
                                                        <label class="form-check-label">Female</label>
                                                    </div>
                                                    @error('gender')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="file"
                                                        class="form-control @error('file') is-invalid @enderror"
                                                        name="file" id="imageInput" value="image"
                                                        accept="image/*"  />
                                                    @error('file')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-none" id="previewImage">
                                                <img alt="selected image" src="" class="img-thumbnail"
                                                    style="height:130px; width:auto;" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="pt-1 mb-4">
                                                <button class="btn login_btn btn-lg btn-block" type="submit"
                                                    name="register_btn">Register</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()


    const imageInput = document.querySelector('#imageInput');
    const previewImage = document.getElementById('previewImage');
    const imgElement = previewImage.querySelector('img');

    imageInput.addEventListener('change', () => {
        if (imageInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgElement.src = e.target.result;
                previewImage.classList.remove("d-none");
            };
            reader.readAsDataURL(imageInput.files[0]);
        } else {
            previewImage.classList.add("d-none");
        }
    });
</script>
</script>

</html> --}}
