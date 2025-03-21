{{-- <script>
    $(document).ready(function() {
        // Fetch and update cart count on page load
        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                type: "GET",
                success: function(response) {
                    $(".shop_cart a:before").text(response.cart_count);
                }
            });
        }

        updateCartCount();
    });
</script><!--================Main Header Area =================--> --}}


<header class="main_header_area">
    <div class="top_header_area row m0">
        <div class="container">
            <div class="float-left">
                <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
                <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    info@cakebakery.com</a>
            </div>
            <div class="float-right">
                <ul class="h_search list_style">
                    <li class="shop_cart">
                        <a href="{{ route('cart') }}">
                            <i class="lnr lnr-cart"></i>
                            <span class="cart-count">0</span> <!-- Ensure this exists -->
                        </a>
                    </li>

                    @if (Auth::check())
                        <li class="dropdown submenu active">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ asset('frontend/img/logo-2.png') }}" class="border-radius" alt=""
                                    height="50" width="50"> test</a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                                <li><a href="index-5.html">Home 5</a></li>
                            </ul>
                        </li>
                        <!-- If user is logged in, show Logout button -->
                        <a class="pest_btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- If user is not logged in, show Registration and Login buttons -->
                        <a class="pest_btn" href="{{ route('registration') }}">Registration</a>
                        <a class="pest_btn" href="{{ route('login') }}">Login</a>
                    @endif
                    {{-- <a class="pest_btn" href="#">Logout</a>
                       <a class="pest_btn" href="#">Registration</a>
                       <a class="pest_btn" href="#">Login</a>
                       <li class="dropdown submenu active">
                           <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false"><img
                                   src="{{ asset('frontend/img/logo-2.png') }}" class="border-radius" alt=""
                                   height="50" width="50"> test</a>
                           <ul class="dropdown-menu">
                               <li><a href="index.html">Home 1</a></li>
                               <li><a href="index-2.html">Home 2</a></li>
                               <li><a href="index-3.html">Home 3</a></li>
                               <li><a href="index-4.html">Home 4</a></li>
                               <li><a href="index-5.html">Home 5</a></li>
                           </ul>
                       </li> --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="main_menu_two">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('frontend/img/logo-2.png') }}"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="my_toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav justify-content-end">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about_us') }}">About Us</a></li>
                        <li><a href="{{ route('our_cake') }}">Our Cakes</a></li>
                        <li><a href="{{ route('protfolio') }}">Protfolio</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>


<!--================End Main Header Area =================-->
