@extends('frontend.main.main')
@section('content')
    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Our Cakes</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('our_cake') }}">Our Cake</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Blog Main Area =================-->
    <section class="our_cakes_area p_100">
        <div class="container">
            <div class="main_title">
                <h2>Our Cakes</h2>
                <h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                    rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                    explicabo.</h5>
            </div>
            <div class="cake_feature_row row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="cake_feature_item">
                            <div class="cake_img">
                                <img src="{{ asset('storage/' . $product->pro_img) }}" alt="{{ $product->pro_name }}"
                                    height="226">
                            </div>
                            <div class="cake_text">
                                <h4>Rs.{{ floor($product->pro_price) }}</h4>
                                <h3>{{ $product->pro_name }}</h3>
                                <a class="pest_btn add_to_cart {{ Auth::check() ? '' : 'disabled' }}"
                                    href="{{ Auth::check() ? 'javascript:viod(0);' : route('login') }}"
                                    data-id="{{ $product->id }}"
                                    onclick="{{ Auth::check() ? '' : 'return confirmLogin(event);' }}">Add to
                                    cart</a>
                                <a class="pest_btn" href="{{ route('product_detail', $product->id) }}"
                                    data-id="{{ $product->id }}">
                                    Product Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================End Blog Main Area =================-->

    <!--================Special Recipe Area =================-->
    <section class="special_recipe_area">
        <div class="container">
            <div class="special_recipe_slider owl-carousel">
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{ asset('frontend/img/recipe/recipe-1.png') }}" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Special Recipe</h4>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi equatur uis autem vel eum.</p>
                            <a class="w_view_btn" href="#">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{ asset('frontend/img/recipe/recipe-1.png') }}" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Special Recipe</h4>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi equatur uis autem vel eum.</p>
                            <a class="w_view_btn" href="#">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="{{ asset('frontend/img/recipe/recipe-1.png') }}" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Special Recipe</h4>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi equatur uis autem vel eum.</p>
                            <a class="w_view_btn" href="#">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="d-flex">
                            <img src="img/recipe/recipe-1.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4>Special Recipe</h4>
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex ea commodi equatur uis autem vel eum.</p>
                            <a class="w_view_btn" href="#">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Special Recipe Area =================-->
@endsection
