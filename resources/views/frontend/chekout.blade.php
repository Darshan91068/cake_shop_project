@extends('frontend.main.main')
@section('content')
    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Chekout</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('checkout') }}">Chekout</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Billing Details Area =================-->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="billing_details_area p_100">
        <div class="container">
            {{-- <div class="return_option">
                <h4>Returning customer? <a href="#">Click here to login</a></h4>
            </div> --}}
            <div class="row">
                <div class="col-lg-7">
                    <div class="main_title">
                        <h2>Billing Details</h2>
                    </div>
                    <div class="billing_form_area">
                        <form class="billing_form row" action="{{ route('order.store') }}" method="post">
                            @csrf
                            <div class="form-group col-md-6">
                                <label for="first">First Name *</label>
                                <input type="text" class="form-control" id="first" name="first_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last">Last Name *</label>
                                <input type="text" class="form-control" id="last" name="last_name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone *</label>
                                <input type="text" class="form-control" id="phone" name="mobile_number" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="state1">City *</label>
                                <select class="" id="city" name="user_city" required
                                    style="border: solid 1px #e8e8e8;height: 38px;border-radius: 0px;width: 100%;padding: 0px 20px;margin: 0px;">
                                    <option value="" disabled selected>Select City</option>
                                    <option value="Amreli">Amreli</option>
                                    <option value="Rajkot">Rajkot</option>
                                    <option value="Ahemdabad">Ahemdabad</option>
                                    <option value="Bhavanager">Bhavanager</option>
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="zip">Postcode / Zip *</label>
                                <input type="text" class="form-control" id="zip" name="pincode" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group col-md-12">
                                @if (session()->has('checkout_data'))
                                    @php
                                        $checkoutDatas = session('checkout_data');
                                        $hidden_grand_total = $checkoutDatas['grand_total'];
                                    @endphp

                                    <input type="hidden" name="main_total" value="{{ $hidden_grand_total ?? 0 }}">
                                @endif
                            </div>


                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="order_box_price">
                        <div class="main_title">
                            <h2>Your Order</h2>
                        </div>
                        <div class="payment_list">
                            @if (session()->has('checkout_data'))
                                @php
                                    $checkoutData = session('checkout_data');
                                    $products = $checkoutData['products'];
                                    $grandTotal = $checkoutData['grand_total'];
                                @endphp

                                <div class="price_single_cost">
                                    <h5>Product <span>Total</span></h5>

                                    @foreach ($products as $product)
                                        <h5>{{ $product['pro_name'] }} &nbsp; Qty:- {{ $product['pro_qty'] }}
                                            <span>Rs.{{ $product['pro_price'] }}</span>
                                        </h5>
                                    @endforeach

                                    <h3>Total <span>Rs.{{ $grandTotal }}</span></h3>
                                </div>
                            @else
                                <p>No checkout data found.</p>
                            @endif

                            <div id="accordion" class="accordion_area">
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Check Payment
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Make your payment directly into our bank account. Please use your Order ID as
                                            the payment reference. Your order won’t be shipped until the funds have cleared
                                            in our account.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                Paypal
                                                <img src="img/checkout-card.png" alt="">
                                            </button>
                                            <a href="#">What is PayPal?</a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Make your payment directly into our bank account. Please use your Order ID as
                                            the payment reference. Your order won’t be shipped until the funds have cleared
                                            in our account.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" value="submit" class="btn pest_btn">place order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Billing Details Area =================-->
@endsection
