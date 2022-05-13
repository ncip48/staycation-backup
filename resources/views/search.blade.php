@extends('layouts.app')

@section('title', 'Search')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        <h2>Hasil Pencarian {{ $keyword }}</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="/">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>Hotel</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="package-area pt-120">
        <div class="container">
            <div class="row">
                @forelse ($products as $pr)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="package-card">
                            <div class="package-thumb">
                                <img src={{ $pr->image }} alt="" class="img-fluid">
                            </div>
                            <div class="package-details">
                                <div class="package-info">
                                    <h3 style="padding: 0px">
                                        <a
                                            href="{{ url('detail?id=' . \Illuminate\Support\Facades\Crypt::encrypt($pr->id)) . '&date=' . $date }}">{{ $pr->name }}</a>
                                    </h3>
                                    <h5>@currency($pr->price)</h5>
                                </div>
                                <div class="package-rating" style="margin-top: 15px">
                                    <strong><i class="flaticon-arrival"></i><span>{{ $pr->city_name }}</span></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row d-flex justify-content-center">
                            <img src="https://i.ibb.co/C1kCxZN/Vector-Search-PNG-Free-Image.png" alt=""
                                class="img-fluid" style="height: 19rem;width:19rem">
                            <strong class="text-center">Hotel Not Found :(</strong>
                        </div>
                    </div>
                @endforelse
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
