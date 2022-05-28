@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-wrap">
                        <h2>Informasi Booking</h2>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="/">Home</a>
                                <i class="bx bx-chevron-right"></i>
                            </li>
                            <li>Booking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-lg-12 text-center pt-120">
        <p class="text-success text-16 line-height-07"><i class="bx bxs-check-circle bx-lg"></i></p>
        <h2 class="text-8" style="margin-bottom: .5rem;">Order Berhasil</h2>
    </div> --}}

    @php
    switch ($result->status) {
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
        default:
            break;
    }
    @endphp

    <div class="col-md-8 col-lg-6 col-xl-5 mx-auto pt-120 pb-120">
        <div class="container">
            @if (session('status'))
                <div class="bg-white shadow-sm rounded p-3 p-sm-4 mb-4">
                    <div class="text-danger text-center">
                        <label>
                            {{ session('status') }}
                        </label>
                    </div>
                </div>
            @endif
            <div class="bg-white shadow-sm rounded p-3 p-sm-4 mb-4">
                <div class="row">
                    <div class="col-sm text-muted">Kode Booking</div>
                    <div class="col-sm text-sm-end fw-bolder">{{ $result->code_booking }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm text-muted">Hotel</div>
                    <div class="col-sm text-sm-end font-weight-600">{{ $result->product_name }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm text-muted">Tanggal</div>
                    <div class="col-sm text-sm-end font-weight-600">{{ $result->create_parse() }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm text-muted">Durasi</div>
                    <div class="col-sm text-sm-end font-weight-600">{{ $result->date_start_parse() }} -
                        {{ $result->date_end_parse() }}</div>
                </div>
                {{-- <hr>
            <div class="row">
                <div class="col-sm text-muted">Mode of Payment</div>
                <div class="col-sm text-sm-end font-weight-600">Credit Card</div>
            </div> --}}
                <hr>
                <div class="row">
                    <div class="col-sm text-muted">Status</div>
                    <div class="col-sm text-sm-end font-weight-600 {{ $textclass }}">{{ $status }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm text-muted">Nama Pemesan</div>
                    <div class="col-sm text-sm-end font-weight-600">{{ $result->name }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm text-muted">No HP</div>
                    <div class="col-sm text-sm-end font-weight-600">{{ $result->phone }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm text-muted">Email</div>
                    <div class="col-sm text-sm-end font-weight-600">{{ $result->email }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm text-muted">Total Pembayaran</div>
                    <div class="col-sm text-sm-end text-6 font-weight-500">@currency($result->total_price)</div>
                </div>
            </div>

            @if ($result->status == 0)
                <div class="bg-white shadow-sm rounded p-3 p-sm-4 mb-4" id="box-payment">
                    <div class="row">
                        <div class="col-sm font-weight-600">Pilih Pembayaran</div>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="payment" id="payment_tunai" value="cash">
                        <label class="form-check-label text-muted" for="payment_tunai">
                            Tunai
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="payment" id="trf_bank" value="trf_bank">
                        <label class="form-check-label text-muted" for="trf_bank">
                            Transfer Bank
                        </label>
                    </div>
                    <div class="ms-4" id="display-rekening" style="display: none">
                    </div>
                </div>
            @endif

            @if ($result->status != 0 && $result->status != 3)
                <div class="bg-white shadow-sm rounded p-3 p-sm-4 mb-4">
                    <div class="row">
                        <div class="col-sm text-muted">Metode Pembayaran</div>
                        <div class="col-sm text-sm-end fw-bolder">
                            {{ $result->payment_type == 'cash' ? 'Tunai' : 'Transfer Bank' }}</div>
                    </div>
                    @if ($result->payment_type == 'bank')
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm text-muted">Nama Bank</div>
                            {{-- <div class="col-sm text-sm-end font-weight-600">{{ $rekening->nama }}</div> --}}
                            <img src="{{ url('images/bank/' . $rekening->logo) }}"
                                alt="{{ url('images/bank/' . $rekening->logo) }}"
                                style="height: 5rem;width:5rem;object-fit:contain;padding:0">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm text-muted">No. Rekening</div>
                            <div class="col-sm text-sm-end font-weight-600">{{ $rekening->no_rekening }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm text-muted">Nama</div>
                            <div class="col-sm text-sm-end font-weight-600">{{ $rekening->atas_nama }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm text-muted">Cabang</div>
                            <div class="col-sm text-sm-end font-weight-600">{{ $rekening->cabang }}</div>
                        </div>
                        <hr>
                        @if ($proof != 0)
                            <div class="row">
                                <div class="col-sm text-muted">Tanggal Transfer</div>
                                <div class="col-sm text-sm-end font-weight-600">{{ $bukti->create_parse() }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm text-muted">Bukti Transfer</div>
                                <div class="col-sm text-sm-end font-weight-600">
                                    <div class="col-sm text-sm-end font-weight-600"><a href="{{ url($bukti->gambar) }}"
                                            target="_blank">Lihat Bukti</a></div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm text-sm-start font-weight-600" style="font-style: italic">Silahkan
                                    melakukan
                                    pembayaran pada rekening
                                    diatas dan sesuai nominal yang diberikan. Lalu silahkan konfirmasi pembayaran</div>
                            </div>
                        @endif
                    @endif
                </div>
            @endif

            <form method="POST" action="{{ url('booking/proof') }}" style="margin-block-end: 0em;flex:1"
                class="me-3" enctype="multipart/form-data">
                @csrf
                @if ($result->status == 2 && $proof == 0)
                    <div class="bg-white shadow-sm rounded p-3 p-sm-4 mb-4" id="box-payment">
                        <div class="row">
                            <div class="col-sm font-weight-600">Upload Bukti Pembayaran</div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <input type="hidden" name="id_booking" value="{{ $result->id }}">
                            <input class="form-control-file" type="file" name="image" id="image">
                        </div>
                    </div>
                @endif

                {{-- jika udah bayar tinggal upload bukti --}}
                @if ($result->status == 2 && $proof == 0)
                    <div class="mt-4 mb-0 d-flex justify-content-between">
                        <button class="btn btn-payment me-3" type="submit">Upload Bukti Pembayaran</button>
                    </div>
                @endif

            </form>

            {{-- jika blm bayar --}}
            @if ($result->status == 0)
                <div class="mt-4 mb-0 d-flex justify-content-between">
                    <input type="hidden" name="obj" id="obj" value="{{ $result }}">
                    <form method="POST" action="{{ url('booking/payment') }}" style="margin-block-end: 0em;flex:1"
                        class="me-3">
                        @csrf
                        <input type="hidden" name="id_booking" id="id_booking" value="{{ $result->id }}">
                        <input type="hidden" name="payment_type" id="payment_type">
                        <input type="hidden" name="id_rekening" id="id_rekening">
                        <button class="btn btn-payment" type="submit" id="pay-button" disabled>Bayar</button>
                    </form>
                    <form method="POST" action="{{ url('booking/cancel') }}" style="margin-block-end: 0em;">
                        @csrf
                        <input type="hidden" name="kode" value="{{ $result->code_booking }}" />
                        <button type="submit" class="btn btn-payment-cancel">Batal</button>
                    </form>
                </div>
            @endif
            {{-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> --}}
        </div>
    </div>
@endsection
