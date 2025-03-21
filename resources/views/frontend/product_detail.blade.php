@extends('frontend.main.main')
@section('content')
    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Product Details</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('product_detail', $product->id) }}">Product Details</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Product Details Area =================-->
    <section class="product_details_area p_100">
        <div class="container">
            <div class="row product_d_price">
                <div class="col-lg-6">
                    <div class="product_img"><img class="img-fluid" src="{{ asset('storage/' . $product->pro_img) }}"
                            alt="{{ $product->pro_name }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product_details_text">
                        <h4>{{ $product->pro_name }}</h4>
                        <p>{{ $product->pro_description }}</p>
                        <h5>Price :<span>{{ $product->pro_price }}</span></h5>
                        <h5 class="pt-0">Weight :<span>{{ $product->pro_weight }} </span></h5>
                        <div class="quantity_box mt-4">
                            <label for="quantity">Quantity :</label>
                            <input type="number" placeholder="1" id="quantity">
                        </div>
                        <a class="pink_more" href="#">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Details Area =================-->

    <!--================Similar Product Area =================-->
    <section class="similar_product_area p_100">
        <div class="container">
            <div class="main_title">
                <h2>Similar Products</h2>
            </div>;
            <div class="row similar_product_inner">
                @foreach ($similarProducts as $similarProduct)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="cake_feature_item">
                            <div class="cake_img">
                                <img src="{{ asset('storage/' . $similarProduct->pro_img) }}"
                                    alt="{{ $similarProduct->pro_name }}" height="226">
                            </div>
                            <div class="cake_text">
                                <h4>Rs.{{ floor($similarProduct->pro_price) }}</h4>
                                <h3>{{ $similarProduct->pro_name }}</h3>
                                <a class="pest_btn add_to_cart {{ Auth::check() ? '' : 'disabled' }}"
                                    href="{{ Auth::check() ? 'javascript:void(0);' : route('login') }}"
                                    data-id="{{ $similarProduct->id }}"
                                    onclick="{{ Auth::check() ? '' : 'return confirmLogin(event);' }}">Add to cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="{{ asset('frontend/img/cake-feature/c-feature-2.jpg') }}" alt="">
                        </div>
                        <div class="cake_text">
                            <h4>$29</h4>
                            <h3>Strawberry Cupcakes</h3>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="{{ asset('frontend/img/cake-feature/c-feature-3.jpg') }}" alt="">
                        </div>
                        <div class="cake_text">
                            <h4>$29</h4>
                            <h3>Strawberry Cupcakes</h3>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="{{ asset('frontend/img/cake-feature/c-feature-4.jpg') }}" alt="">
                        </div>
                        <div class="cake_text">
                            <h4>$29</h4>
                            <h3>Strawberry Cupcakes</h3>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--================End Similar Product Area =================-->
@endsection
