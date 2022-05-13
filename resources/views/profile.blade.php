@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        <h2>Profile</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="/">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mx-auto pt-120 pb-120">
        <div class="container">
            <div class="myaccount">
                <nav>
                    <div class="nav nav-tabs myaccount-nav" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="true"></i>Profile</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-booking"
                            role="tab" aria-controls="nav-booking" aria-selected="false"><i
                                class="fa fa-briefcase"></i>booking</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane active in" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="profile-details">
                            <div class="head-profile">
                                <h3>Profil Saya</h3>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body">
                                        <p>{{ $message }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="content-profile">
                                <div class="row">
                                    <div class="col-lg-3 col-md-5">
                                        @php
                                            if (is_null($user->picture)) {
                                                $foto = 'https://www.seekpng.com/png/detail/428-4287240_no-avatar-user-circle-icon-png.png';
                                            } else {
                                                $foto = $user->picture;
                                            }
                                        @endphp
                                        <img src={{ $foto }} style="height: 250px;widht:250px">
                                    </div>
                                    <div class="col-lg-9 col-md-7">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <p class="title">
                                                        Name:
                                                    </p>
                                                </div>
                                                <div class="col-md-7">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <p class="title">
                                                        Date of Birth:
                                                    </p>
                                                </div>
                                                <div class="col-md-7">
                                                    {{ $user->dob }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <p class="title">
                                                        Email:
                                                    </p>
                                                </div>
                                                <div class="col-md-7">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <p class="title">
                                                        Phone:
                                                    </p>
                                                </div>
                                                <div class="col-md-7">
                                                    {{ $user->phone }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <p class="title">
                                                        Address:
                                                    </p>
                                                </div>
                                                <div class="col-md-7">
                                                    {{ $user->address }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-5">
                                        <div class="d-flex justify-content-between">
                                            <div class="text-right mt-4">
                                                <a href="{{ url('edit-profile') }}" class="button p-3">Ganti
                                                    Foto</a>
                                            </div>
                                            <div class="text-right mt-4">
                                                <a href="{{ url('edit-profile') }}" class="button p-3">Edit
                                                    Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-booking" role="tabpanel" aria-labelledby="nav-booking-tab">
                        <div class="booking-details">
                            <div class="head-booking">
                                <h3>Riwayat Booking</h3>
                            </div>
                            <div class="content-booking">
                                @forelse ($bookings as $b)
                                    @php
                                        switch ($b->status) {
                                            case 0:
                                                $status = 'Menunggu Pembayaran';
                                                $textclass = 'text-success';
                                                break;
                                            case 1:
                                                $status = 'Sukses';
                                                $textclass = 'text-success';
                                                break;
                                            case 2:
                                                $status = 'Sedang Di Proses';
                                                $textclass = 'text-success';
                                                break;
                                            case 3:
                                                $status = 'Dibatalkan';
                                                $textclass = 'text-danger';
                                                break;
                                            case 4:
                                                $status = 'Pembayaran Kadaluarsa';
                                                $textclass = 'text-danger';
                                                break;
                                            case 5:
                                                $status = 'Konfirmasi Pembayaran';
                                                $textclass = 'text-success';
                                                break;
                                            default:
                                                break;
                                        }
                                    @endphp
                                    <div class="booking-info">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-12">
                                                <div class="booking-date">
                                                    <p class="date">
                                                        @date($b->created_at)
                                                    </p>
                                                    <p class="month">
                                                        @month($b->created_at)
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-12">
                                                <div class="booking-detail">
                                                    <div class="detail-info">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p>
                                                                    code booking:
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{ $b->code_booking }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detail-info">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p>
                                                                    booking date:
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                @datetime($b->created_at)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detail-info">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p>
                                                                    booking details:
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                @dateonly($b->date_start) - @dateonly($b->date_end)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detail-info">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p>
                                                                    client:
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{ $b->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detail-info">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p>
                                                                    Email:
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{ $b->email }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detail-info">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p>
                                                                    Phone:
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{ $b->phone }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="detail-info">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p>
                                                                    Status:
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{ $status }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-12">
                                                @if ($b->status == 0)
                                                    <div class="booking-action">
                                                        <a class="btn-cancle bookbtn" href="#">
                                                            Batalkan
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                @empty
                                    <div class="booking-info">
                                        <div class="text-center">
                                            <h4>Belum ada booking yang dilakukan</h4>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
