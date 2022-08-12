@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        <h2>Contact Us</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="/">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-wrapper pt-90">
        <div class="contact-cards">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-card">
                            <div class="contact-icon" style="transform: none"><i class="flaticon-arrival"></i>
                            </div>
                            <div class="contact-info">
                                <h5>Address</h5>
                                <p>{{ $site->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-card">
                            <div class="contact-icon" style="transform: none"><i class="flaticon-customer-service"></i>
                            </div>
                            <div class="contact-info">
                                <h5>Email & Phone</h5>
                                <p>{{ $site->email }}</p>
                                <p>{{ $site->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="contact-card">
                            <div class="contact-icon" style="transform: none"><i class="flaticon-thumbs-up"></i>
                            </div>
                            <div class="contact-info">
                                <h5>Social Media</h5>
                                <ul class="contact-icons">
                                    <li><a href="{{ $site->instagram }}" target="_blank"><i
                                                class="bx bxl-instagram"></i></a>
                                    </li>
                                    <li><a href="{{ $site->facebook }}" target="_blank"><i class="bx bxl-facebook"></i></a>
                                    </li>
                                    <li><a href="{{ $site->twitter }}" target="_blank"><i class="bx bxl-twitter"></i></a>
                                    </li>
                                    <li><a href="{{ $site->whatsapp }}" target="_blank"><i class="bx bxl-whatsapp"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact-inputs pt-120">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-details">
                            <h5 class="contact-d-head">Get In Touch</h5>
                            <p>{{ $site->description }}
                            </p>
                            <ul class="office-clock">
                                <li>
                                    <div class="clock-icon"><i class="flaticon-clock-1"></i></div>
                                    <div class="clock-info">
                                        <h5>Open Hour</h5>
                                        <p>{{ $site->open }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="clock-icon"><i class="flaticon-clock-1"></i></div>
                                    <div class="clock-info">
                                        <h5>Close Hour</h5>
                                        <p>{{ $site->close }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-warning alert-dismissible show fade" role="alert">
                                <div>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <div class="contact-form">
                            <form action="{{ url('contact') }}" method="post">
                                @csrf
                                <h5 class="contact-d-head">Contact Us</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Full Name" name="name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Subject" name="subject">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="Your Email" name="email">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Phone" name="phone">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea cols="30" rows="7" placeholder="Write Message" name="message"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="submit" class="form-contact" value="Submit Now"
                                            style="border-radius: 6px">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="newsletter-wrapper">
                        <h2>Subscribe To Our Newsletter
                            For Latest Update</h2>
                        <form>
                            <div class="input-group newsletter-input">
                                <input type="text" class="form-control" placeholder="Enter Your Email"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button"
                                    id="button-addon2">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
