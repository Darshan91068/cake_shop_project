@extends('frontend.main.main')
@section('content')
    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Contact Us</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Contact Form Area =================-->
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        </script>
    @endif

    <section class="contact_form_area p_100">
        <div class="container">
            <div class="main_title">
                <h2>Get In Touch</h2>
                <h5>Do you have anything in your mind to let us know? Kindly don't delay to connect to us by means of our
                    contact form.</h5>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <form class="row contact_us_form" action="{{ route('contact.submit') }}" method="post" id="contactForm"
                        novalidate="novalidate">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Your name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email address" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Write message" required></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" value="submit" class="btn order_s_btn form-control">Submit Now</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 offset-md-1">
                    <div class="contact_details">
                        <div class="contact_d_item">
                            <h3>Address :</h3>
                            <p>54B, Tailstoi Town 5238 <br /> La city, IA 522364</p>
                        </div>
                        <div class="contact_d_item">
                            <h5>Phone : <a href="tel:01372466790">01372.466.790</a></h5>
                            <h5>Email : <a href="mailto:rockybd1995@gmail.com">rockybd1995@gmail.com</a></h5>
                        </div>
                        <div class="contact_d_item">
                            <h3>Opening Hours :</h3>
                            <p>8:00 AM – 10:00 PM</p>
                            <p>Monday – Sunday</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Contact Form Area =================-->
@endsection
