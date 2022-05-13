@extends('layouts.app')

@section('title', 'Detail Hotel')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        <h2>Detail Hotel</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="/">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>Hotel {{ $hotel->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="package-details-wrapper pt-120 pb-120">
        @php
            $countEmpty = 0;
            $countAvailable = 0;
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="package-details">
                        <div class="package-thumb">
                            <img src="{{ $hotel->image }}" alt="" style="max-height: 385px">
                        </div>
                        <div class="package-header">
                            <div class="row">
                                <div class="col-md-8 package-title">
                                    <h3>{{ $hotel->name }}</h3>
                                    <strong><i class="flaticon-arrival"></i>
                                        {{ $hotel->address }}
                                    </strong>
                                </div>
                                <div class="col-md-4 pd-review">
                                    <p><strong>
                                            @currency($hotel->price)/malam
                                        </strong></p>
                                    <ul>
                                        {!! str_repeat('<li><i class="bx bxs-star"></i></li>', $total_star) !!}
                                        {!! str_repeat('<li><i class="bx bx-star"></i></li>', 5 - floor($total_star)) !!}
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="package-tab">
                            <div class="p-short-info">
                                <div class="single-info">
                                    <i class="flaticon-clock"></i>
                                    <div class="info-texts">
                                        <strong>Kamar Tersedia</strong>
                                        <p>{{ $hotel->total_rooms }}</p>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <i class="flaticon-footprints"></i>
                                    <div class="info-texts">
                                        <strong>Tour Type</strong>
                                        <p>4 Days</p>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <i class="flaticon-traveller"></i>
                                    <div class="info-texts">
                                        <strong>Group Size</strong>
                                        <p>30 People</p>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <i class="flaticon-translate"></i>
                                    <div class="info-texts">
                                        <strong>Languages</strong>
                                        <p>Any Language</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content p-tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tab-content-1">
                                                <div class="p-overview">
                                                    <h5>Deskripsi</h5>
                                                    <p>{{ $hotel->description }}</p>
                                                </div>
                                                <div class="p-rationg">
                                                    <h5>Rating</h5>
                                                    <div class="rating-card">
                                                        <div class="r-card-avarag">
                                                            <h2>{{ $total_star }}</h2>
                                                            <h5>
                                                                @if ($total_star >= 1 && $total_star <= 1.5)
                                                                    Buruk
                                                                @elseif($total_star >= 2 && $total_star <= 3)
                                                                    Cukup
                                                                @elseif ($total_star >= 3 && $total_star <= 4)
                                                                    Bagus
                                                                @elseif ($total_star >= 4 && $total_star <= 5)
                                                                    Sangat Bagus
                                                                @elseif ($total_star >= 5)
                                                                    Sempurna
                                                                @else
                                                                    Belum Ada Review
                                                                @endif
                                                            </h5>
                                                        </div>
                                                        <div class="r-card-info">
                                                            <ul>
                                                                <li>
                                                                    <strong>Pelayanan</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            {!! str_repeat('<i class="bx bxs-star"></i>', $r0) !!}
                                                                            {!! str_repeat('<i class="bx bx-star"></i>', 5 - $r0) !!}
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <strong>Fasilitas</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            {!! str_repeat('<i class="bx bxs-star"></i>', $r1) !!}
                                                                            {!! str_repeat('<i class="bx bx-star"></i>', 5 - $r1) !!}
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <strong>Kenyamanan</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            {!! str_repeat('<i class="bx bxs-star"></i>', $r2) !!}
                                                                            {!! str_repeat('<i class="bx bx-star"></i>', 5 - $r2) !!}
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <strong>Keamanan</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            {!! str_repeat('<i class="bx bxs-star"></i>', $r3) !!}
                                                                            {!! str_repeat('<i class="bx bx-star"></i>', 5 - $r3) !!}
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <strong>Keaestetican</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            {!! str_repeat('<i class="bx bxs-star"></i>', $r4) !!}
                                                                            {!! str_repeat('<i class="bx bx-star"></i>', 5 - $r4) !!}
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                            </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-review">
                                                    <ul>
                                                        @foreach ($reviews as $re)
                                                            <li class="p-review-card">
                                                                <div class="p-review-info">
                                                                    <div class="p-reviewr-img">
                                                                        <img src="{{ $re->picture ?? 'https://www.seekpng.com/png/detail/428-4287240_no-avatar-user-circle-icon-png.png' }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="p-reviewer-info">
                                                                        <strong>{{ $re->name }}</strong>
                                                                        <p>@datewithtime($re->created_at)</p>
                                                                        <p>{{ $re->created_at->diffForHumans() }}</p>
                                                                        <ul class="review-star">
                                                                            {!! str_repeat('<li><i class="bx bxs-star"></i></li>', $re->total_rating) !!}
                                                                            {!! str_repeat('<li><i class="bx bx-star"></i></li>', 5 - $re->total_rating) !!}
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="p-review-texts">
                                                                    <p>{{ $re->comment }}</p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @if (Auth::user())
                                                    <div class="p-review-input">
                                                        <form method="POST" action={{ url('review') }}>
                                                            @csrf
                                                            <h5>Berikan Ulasan</h5>
                                                            <div class="row">
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $hotel->id }}">
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ $user->id }}">
                                                                <div class="col-lg-12">
                                                                    <textarea name="comment" cols="30" rows="7" placeholder="Tulis ulasan..."></textarea>
                                                                </div>
                                                                <input type="hidden" name="r0" id="r0" value="0">
                                                                <input type="hidden" name="r1" id="r1" value="0">
                                                                <input type="hidden" name="r2" id="r2" value="0">
                                                                <input type="hidden" name="r3" id="r3" value="0">
                                                                <input type="hidden" name="r4" id="r4" value="0">
                                                                <div class="row">
                                                                    <div class="col-3">Pelayanan</div>
                                                                    <div class="col-9">
                                                                        <div class="my-rating-r0"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">Fasilitas</div>
                                                                    <div class="col-9">
                                                                        <div class="my-rating-r1"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">Kenyamanan</div>
                                                                    <div class="col-9">
                                                                        <div class="my-rating-r2"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">Keamanan</div>
                                                                    <div class="col-9">
                                                                        <div class="my-rating-r3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">Keaesthetican</div>
                                                                    <div class="col-9">
                                                                        <div class="my-rating-r4"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <input type="submit" value="Submit">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package-d-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="p-sidebar-form">
                                    <form method="POST" action={{ url('transaction') }}>
                                        @csrf
                                        <h5 class="package-d-head">Booking Hotel Ini</h5>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between">
                                                    <label>Nama Lengkap</label>
                                                    @if ($user)
                                                        <strong style="cursor: pointer;color:#ff7f47" id="btn_fill">Isi
                                                            sesuai
                                                            profil</strong>
                                                    @endif
                                                </div>
                                                <input type="text" name="name" placeholder="John Doe" required
                                                    id="form_name">
                                            </div>
                                            <div class="col-lg-12">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="johndoe@gmail.com" required
                                                    id="form_email">
                                            </div>
                                            <div class="col-lg-12">
                                                <label>No HP</label>
                                                <input type="tel" name="phone" placeholder="085156842765" required
                                                    id="form_phone">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Check In</label>
                                                <div class="calendar-input">
                                                    <input type="date" class="input-field" style="cursor: default"
                                                        id="date_start" value="{{ $date }}" required
                                                        name="date_start">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Check Out</label>
                                                <div class="calendar-input">
                                                    <input type="date" class="input-field" placeholder="18:00"
                                                        id="date_end" required name="date_end">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h4>Total</h4>
                                                    <h4 id="total-div">Rp. 0</h4>
                                                </div>
                                            </div>
                                            <input type="hidden" class="input-field" id="price"
                                                value={{ $hotel->price }}>
                                            <input type="hidden" name="product_id" class="input-field"
                                                value="{{ $hotel->id }}">
                                            <input type="hidden" name="user_id" class="input-field"
                                                value="{{ $user ? $user->id : 0 }}">
                                            <input type="hidden" name="duration" class="input-field" id="duration"
                                                value="1">
                                            <input type="hidden" name="date_starts" class="input-field" id="datestart">
                                            <input type="hidden" name="date_ends" class="input-field" id="dateend">
                                            <input type="hidden" placeholder="0" value="0" name="total_price" readonly
                                                id="total_price">
                                            <input type="hidden" value="{{ $user }}" id="user_full">
                                            </h4>
                                            <div class="col-lg-12">
                                                <input type="submit" value="Pesan">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
