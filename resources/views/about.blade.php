@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        <h2>About Us</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="/">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-wrapper mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="about-wrapper-left">
                        <div class="about-img wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <img src="/images/about-1.png" alt="" class="img-fluid">
                        </div>
                        <div class="about-video wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <img src="/images/about-2.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="about-wrapper-right section-head head-left">
                        <h5>About {{ $site->name }}</h5>
                        <h2>The Best Hotel Agency
                            Company.</h2>
                        <p>{{ $site->about }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="achievement-area-2 mt-105 p-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-head pb-40">
                        <h5>Why Tourx?</h5>
                        <h2>Why you are travel with tourx</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft animated" data-wow-duration="1500ms"
                    data-wow-delay="0ms">
                    <div class="achievement-card-2">
                        <div class="achieve-img">
                            <img src="{{ asset('/images/e-1.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="achieve-info">
                            <h5>{{ $product }} Hotels</h5>
                            <div class="achieve-icon">
                                <i class="flaticon-guide"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft animated" data-wow-duration="1500ms"
                    data-wow-delay="200ms">
                    <div class="achievement-card-2">
                        <div class="achieve-img">
                            <img src="{{ asset('/images/e-2.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="achieve-info">
                            <h5>{{ $transaction }} Transaksi</h5>
                            <div class="achieve-icon">
                                <i class="flaticon-trust"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft animated" data-wow-duration="1500ms"
                    data-wow-delay="400ms">
                    <div class="achievement-card-2">
                        <div class="achieve-img">
                            <img src="{{ asset('/images/e-3.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="achieve-info">
                            <h5>{{ $review }} Review</h5>
                            <div class="achieve-icon">
                                <i class="flaticon-experience"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInLeft animated" data-wow-duration="1500ms"
                    data-wow-delay="600ms">
                    <div class="achievement-card-2">
                        <div class="achieve-img">
                            <img src="{{ asset('/images/e-4.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="achieve-info">
                            <h5>{{ $user }} Pelanggan</h5>
                            <div class="achieve-icon">
                                <i class="flaticon-traveller"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="review-area mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="section-head pb-40">
                        <h5>Our Traveller Say</h5>
                        <h2>What Oue Traveller Say About Us</h2>
                    </div>
                </div>
            </div>
            <div class="review-slider owl-carousel">
                @foreach ($reviews as $r)
                    <div class="review-card ">
                        <div class="reviewer-img">
                            <img src="{{ $r->picture ?? 'https://www.seekpng.com/png/detail/428-4287240_no-avatar-user-circle-icon-png.png' }}"
                                alt="" class="img-fluid">
                        </div>
                        <div class="reviewer-info">
                            <h3>{{ $r->name }}</h3>
                            <h5>Traveller</h5>
                            <p>{{ $r->comment }}</p>
                        </div>
                    </div>
                @endforeach
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
