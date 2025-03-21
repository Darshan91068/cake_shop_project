<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('frontend/img/fav-icon.png') }}" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cake - Bakery</title>

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

    {{-- Jquery cdn --}}
    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    @if (session('error'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: "Access Denied",
                    text: "{{ session('error') }}",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif
