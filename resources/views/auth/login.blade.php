@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        {{-- <h2>Login</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="/">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>Login</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mx-auto pt-120 pb-120">
        <div class="container">
            <section id="contact" class="contact-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 contact-sec">
                            <!--<div class="row contact-form-design-area">-->
                            <div class="col-lg-6 col-md-12 m-auto">
                                <div class="section-title text-center">
                                    <h2>Login</h2>
                                    <div class="title-separator-outer ">
                                        <div class="title-separator style-liner" style="background-color:#ff7f47"></div>
                                    </div>
                                </div>
                                <!-- START CONTACT FORM DESIGN AREA -->
                                <div class="login-form">
                                    <form id="login-form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="email"
                                                    class="col-form-label text-md-end">{{ __('Username') }}</label>
                                                <input id="username" type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="username" value="{{ old('username') }}" autocomplete="username"
                                                    autofocus>
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="password"
                                                    class="col-form-label text-md-end">{{ __('Password') }}</label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="checkbox" name="remember"> Remember
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <a href="/password/reset">Lupa Password?</a>
                                            </div>
                                            <div class="col-md-12 text-center login-btn">
                                                <div class="actions wow fadeInUp" data-wow-delay=".4s">
                                                    <input type="submit" value="Login" name="submit" id="submitButton"
                                                        class="" title="Login!">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- / END CONTACT FORM DESIGN AREA </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
