@extends('frontend.main.main')
@section('content')
    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Cart</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('cart') }}">Cart</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Cart Table Area =================-->
    <section class="cart_table_area p_100">
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Preview</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">

                    </tbody>
                </table>
            </div>
            <div class="row cart_total_inner">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <div class="cart_total_text">
                        <div class="cart_head">
                            Cart Total
                        </div>
                        <div class="total">
                            <h4>Total <span>Rs.00.00</span></h4>
                        </div>
                        <div class="cart_footer">
                            <a class="pest_btn btn_checkout" href="#">Proceed to Checkout</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Table Area =================-->
@endsection
