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
                            <div class="package-title">
                                <h3>{{ $hotel->name }}</h3>
                                <strong><i class="flaticon-arrival"></i>
                                    {{ $hotel->address }}
                                </strong>
                            </div>
                            <div class="pd-review">
                                <p><strong>
                                        @currency($hotel->price)/malam
                                    </strong></p>
                                <ul>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bx-star'></i></li>
                                </ul>
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
                                                            <h2>4.9</h2>
                                                            <h5>Excellent</h5>
                                                        </div>
                                                        <div class="r-card-info">
                                                            <ul>
                                                                <li>
                                                                    <strong>Accommodation</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <strong>Transport</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bx-star'></i>
                                                                            <i class='bx bx-star'></i>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <strong>Comfort</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bx-star'></i>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <strong>Hospitality</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bx-star'></i>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <strong>Food</strong>
                                                                    <ul class="r-rating">
                                                                        <li>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bxs-star'></i>
                                                                            <i class='bx bx-star'></i>
                                                                            <i class='bx bx-star'></i>
                                                                            <i class='bx bx-star'></i>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-review">
                                                    <ul>
                                                        <li class="p-review-card">
                                                            <div class="p-review-info">
                                                                <div class="p-reviewr-img">
                                                                    <img src="assets/images/package/pr-1.png" alt="">
                                                                </div>
                                                                <div class="p-reviewer-info">
                                                                    <strong>Bertram Bil</strong>
                                                                    <p>2 April, 2021 10.00PM</p>
                                                                    <ul class="review-star">
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="p-review-texts">
                                                                <p>Morbi dictum pulvinar velit, id mollis lorem faucibus
                                                                    acUt sed
                                                                    lacinia ipsum. Suspendisse massa augue lorem faucibus
                                                                    acUt
                                                                    sed lacinia ipsum. Suspendisse </p>
                                                            </div>
                                                            <a href="#" class="r-reply-btn"><i class='bx bx-reply'></i>
                                                                Reply</a>
                                                        </li>
                                                        <li class="p-review-card">
                                                            <div class="p-review-info">
                                                                <div class="p-reviewr-img">
                                                                    <img src="assets/images/package/pr-1.png" alt="">
                                                                </div>
                                                                <div class="p-reviewer-info">
                                                                    <strong>Bertram Bil</strong>
                                                                    <p>2 April, 2021 10.00PM</p>
                                                                    <ul class="review-star">
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="p-review-texts">
                                                                <p>Morbi dictum pulvinar velit, id mollis lorem faucibus
                                                                    acUt sed
                                                                    lacinia ipsum. Suspendisse massa augue lorem faucibus
                                                                    acUt
                                                                    sed lacinia ipsum. Suspendisse </p>
                                                            </div>
                                                            <a href="#" class="r-reply-btn"><i class='bx bx-reply'></i>
                                                                Reply</a>
                                                        </li>
                                                        <li class="p-review-card">
                                                            <div class="p-review-info">
                                                                <div class="p-reviewr-img">
                                                                    <img src="assets/images/package/pr-1.png" alt="">
                                                                </div>
                                                                <div class="p-reviewer-info">
                                                                    <strong>Bertram Bil</strong>
                                                                    <p>2 April, 2021 10.00PM</p>
                                                                    <ul class="review-star">
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                        <li> <i class='bx bxs-star'></i> </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="p-review-texts">
                                                                <p>Morbi dictum pulvinar velit, id mollis lorem faucibus
                                                                    acUt sed
                                                                    lacinia ipsum. Suspendisse massa augue lorem faucibus
                                                                    acUt
                                                                    sed lacinia ipsum. Suspendisse </p>
                                                            </div>
                                                            <a href="#" class="r-reply-btn"><i class='bx bx-reply'></i>
                                                                Reply</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="p-review-input">
                                                    <form>
                                                        <h5>Leave Your Comment</h5>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="text" placeholder="Nama">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" placeholder="Your Email">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <input type="text" placeholder="Tour Type">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <textarea cols="30" rows="7" placeholder="Write Message"></textarea>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <ul class="input-rating">
                                                                    <li><i class='bx bx-star'></i></li>
                                                                    <li><i class='bx bx-star'></i></li>
                                                                    <li><i class='bx bx-star'></i></li>
                                                                    <li><i class='bx bx-star'></i></li>
                                                                    <li><i class='bx bx-star'></i></li>
                                                                </ul>
                                                                <input type="submit" value="Submit Now">
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
                </div>
                <div class="col-lg-4">
                    <div class="package-d-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="p-sidebar-form">
                                    <form method="POST" action={{ url('booking') }}>
                                        @csrf
                                        <h5 class="package-d-head">Booking Hotel Ini</h5>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name="name" placeholder="John Doe" required>
                                            </div>
                                            <div class="col-lg-12">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="johndoe@gmail.com" required>
                                            </div>
                                            <div class="col-lg-12">
                                                <label>No HP</label>
                                                <input type="tel" name="handphone" placeholder="085156842765" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Check In</label>
                                                <div class="calendar-input">
                                                    <input type="date" class="input-field" style="cursor: default"
                                                        id="starts" value="{{ $date }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Check Out</label>
                                                <div class="calendar-input">
                                                    <input type="text" class="input-field check-out" id="ends"
                                                        placeholder="18:00" required>
                                                    <i class="flaticon-calendar"></i>
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
                                            <input type="hidden" name="id_product" class="input-field"
                                                value="{{ $hotel->id }}">
                                            <input type="hidden" name="duration" class="input-field" id="duration">
                                            <input type="hidden" name="start" class="input-field" id="datestart">
                                            <input type="hidden" name="end" class="input-field" id="dateend">
                                            <input type="hidden" placeholder="0" value="0" name="total_price" readonly
                                                id="total_price">
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
