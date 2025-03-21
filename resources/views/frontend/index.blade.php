@extends('frontend.main.main')
@section('content')
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

    <!--================Slider Area =================-->
    <section class="main_slider_area" style="margin-top: 108px;">
        <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
            <ul>
                <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-thumb="{{ asset('frontend/img/home-slider/slider-3.jpg') }}" data-rotate="0"
                    data-saveperformance="off" data-title="Creative" data-param1="01" data-param2="" data-param3=""
                    data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                    data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('frontend/img/home-slider/slider-3.jpg') }}" alt=""
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5"
                        class="rev-slidebg" data-no-retina>

                    <!-- LAYER NR. 1 -->
                    <div class="slider_text_box">
                        <div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['175','175','125','165','160']" data-fontsize="['65','65','65','40','30']"
                            data-lineheight="['80','80','80','50','40']" data-width="['800','800','800','500']"
                            data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['left','left','left','left']">Quality Products ... <br /> with sweet, eggs &
                            breads</div>

                        <div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['345','345','300','300','250']" data-fontsize="['20','20','20','20','16']"
                            data-lineheight="['28','28','28','28']" data-width="['640','640','640','640','350']"
                            data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                            data-transform_idle="o:1;"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia consequuntur
                            magni dolores eos qui ratione
                        </div>

                        <div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['435','435','390','390','360']" data-fontsize="['14','14','14','14']"
                            data-lineheight="['46','46','46','46']" data-width="none" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                            <a class="main_btn" href="#">See the recipe</a>
                        </div>
                    </div>
                </li>
                <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-thumb="{{ asset('frontend/img/home-slider/slider-4.jpg') }}" data-rotate="0"
                    data-saveperformance="off" data-title="Creative" data-param1="01" data-param2="" data-param3=""
                    data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                    data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('frontend/img/home-slider/slider-4.jpg') }}" alt=""
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5"
                        class="rev-slidebg">
                    <!-- LAYERS -->
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="slider_text_box">
                        <div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['175','175','125','165','160']" data-fontsize="['65','65','65','40','30']"
                            data-lineheight="['80','80','80','50','40']" data-width="['800','800','800','500']"
                            data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['left','left','left','left']">Cake Bakery ... <br /> make delicious products
                        </div>

                        <div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['345','345','300','300','250']" data-fontsize="['20','20','20','20','16']"
                            data-lineheight="['28','28','28','28']" data-width="['640','640','640','640','350']"
                            data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                            data-transform_idle="o:1;"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia consequuntur
                            magni dolores eos qui ratione
                        </div>

                        <div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['435','435','390','390','360']" data-fontsize="['14','14','14','14']"
                            data-lineheight="['46','46','46','46']" data-width="none" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                            <a class="main_btn" href="#">See the recipe</a>
                        </div>
                    </div>
                </li>
                <li data-index="rs-1589" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-thumb="{{ asset('frontend/img/home-slider/slider-5.jpg') }}" data-rotate="0"
                    data-saveperformance="off" data-title="Creative" data-param1="01" data-param2="" data-param3=""
                    data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                    data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('frontend/img/home-slider/slider-5.jpg') }}" alt=""
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5"
                        class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="slider_text_box">
                        <div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['175','175','125','165','160']" data-fontsize="['65','65','65','40','30']"
                            data-lineheight="['80','80','80','50','40']" data-width="['800','800','800','500']"
                            data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['left','left','left','left']">Cake theme ... <br /> made with care and love
                        </div>

                        <div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['345','345','300','300','250']" data-fontsize="['20','20','20','20','16']"
                            data-lineheight="['28','28','28','28']" data-width="['640','640','640','640','350']"
                            data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on"
                            data-transform_idle="o:1;"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia consequuntur
                            magni dolores eos qui ratione
                        </div>

                        <div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['435','435','390','390','360']" data-fontsize="['14','14','14','14']"
                            data-lineheight="['46','46','46','46']" data-width="none" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                            <a class="main_btn" href="#">See the recipe</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--================End Slider Area =================-->

    <!--================Welcome Area =================-->
    <section class="welcome_bakery_area cake_feature_main p_100">
        <div class="container">
            <div class="main_title">
                <h2>Our Product Cakes</h2>
                <h5> Seldolor sit amet consect etur</h5>
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
                                    href="{{ Auth::check() ? 'javascript:void(0);' : route('login') }}"
                                    data-id="{{ $product->id }}"
                                    onclick="{{ Auth::check() ? '' : 'return confirmLogin(event);' }}">
                                    Add to Cart
                                </a>
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
    <!--================End Welcome Area =================-->

    <!--================Service We offer Area =================-->
    <section class="service_we_offer_area p_100">
        <div class="container">
            <div class="single_w_title">
                <h2>Services We offer</h2>
            </div>
            <div class="row we_offer_inner">
                <div class="col-lg-4">
                    <div class="s_we_item">
                        <div class="media">
                            <div class="d-flex">
                                <i class="flaticon-food-6"></i>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Cookies Cakes</h4>
                                </a>
                                <p>Lorem Ipsum is simply my text of the printing and Ipsum is simply text of the Ipsum is
                                    simply.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="s_we_item">
                        <div class="media">
                            <div class="d-flex">
                                <i class="flaticon-food-5"></i>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Tasty Cupcakes</h4>
                                </a>
                                <p>Lorem Ipsum is simply my text of the printing and Ipsum is simply text of the Ipsum is
                                    simply.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="s_we_item">
                        <div class="media">
                            <div class="d-flex">
                                <i class="flaticon-food-3"></i>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Wedding Cakes</h4>
                                </a>
                                <p>Lorem Ipsum is simply my text of the printing and Ipsum is simply text of the Ipsum is
                                    simply.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="s_we_item">
                        <div class="media">
                            <div class="d-flex">
                                <i class="flaticon-book"></i>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Awesome Recipes</h4>
                                </a>
                                <p>Lorem Ipsum is simply my text of the printing and Ipsum is simply text of the Ipsum is
                                    simply.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="s_we_item">
                        <div class="media">
                            <div class="d-flex">
                                <i class="flaticon-food-4"></i>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Menu Planner</h4>
                                </a>
                                <p>Lorem Ipsum is simply my text of the printing and Ipsum is simply text of the Ipsum is
                                    simply.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="s_we_item">
                        <div class="media">
                            <div class="d-flex">
                                <i class="flaticon-transport"></i>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    <h4>Home Delivery</h4>
                                </a>
                                <p>Lorem Ipsum is simply my text of the printing and Ipsum is simply text of the Ipsum is
                                    simply.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Service We offer Area =================-->

    <!--================New Arivals Area =================-->
    <section class="new_arivals_area p_100">
        <div class="container">
            <div class="single_pest_title">
                <h2>New Arrivals</h2>
            </div>
            <div class="row arivals_inner">
                <div class="col-lg-6 col-sm-7">
                    <div class="arivals_chocolate">
                        <div class="arivals_pic">
                            <img class="img-fluid" src="{{ asset('frontend/img/cake-feature/arivals-pic.jpg') }}"
                                alt="">
                            {{-- <div class="price_text">
                                <h5>$39</h5>
                            </div> --}}
                        </div>
                        {{-- <div class="arivals_text">
                            <h4>Chocolate <span>Crumble</span></h4>
                            <a href="#">Mine cup</a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="arivals_slider owl-carousel">
                        @foreach ($products as $product)
                            <div class="item">
                                <div class="cake_feature_item">
                                    <div class="cake_img">
                                        <img src="{{ asset('storage/' . $product->pro_img) }}"
                                            alt="{{ $product->pro_name }}" height="226">
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
                        <div class="item">
                            <div class="cake_feature_item">
                                <div class="cake_img">
                                    <img src="{{ asset('frontend/img/cake-feature/arivals-2.jpg') }}" alt="">
                                </div>
                                <div class="cake_text">
                                    <h4>$29</h4>
                                    <h3>Chocolate Cupcakes</h3>
                                    <a class="pest_btn" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cake_feature_item">
                                <div class="cake_img">
                                    <img src="{{ asset('frontend/img/cake-feature/arivals-1.jpg') }}" alt="">
                                </div>
                                <div class="cake_text">
                                    <h4>$29</h4>
                                    <h3>Strawberry Cupcakes</h3>
                                    <a class="pest_btn" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cake_feature_item">
                                <div class="cake_img">
                                    <img src="{{ asset('frontend/img/cake-feature/arivals-2.jpg') }}" alt="">
                                </div>
                                <div class="cake_text">
                                    <h4>$29</h4>
                                    <h3>Chocolate Cupcakes</h3>
                                    <a class="pest_btn" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End New Arivals Area =================-->
    <!--================End Newsletter Area =================-->
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
