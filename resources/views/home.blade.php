@extends('layouts.app')

@section('content')
<!-- Header Banner -->
<section id="banner" class="py-5 text-center" style="background-color: #004E7A; color: #fff;">
    <div class="container">
        <h2 class="fw-bold">MIX & MATCH</h2>
        <p>Temukan furniture impian Anda</p>
        <img src="{{ asset('images/image1banner.png') }}" alt="Sofa" class="img-fluid mt-3" style="max-width: 300px;">
    </div>
</section>

<!-- Point dan Voucher -->
<section id="points-vouchers" class="py-3 bg-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-6 border-end">
                <p class="mb-1 fw-bold">15700 <span style="color: gray; font-size: 0.9rem;">Pts</span></p>
                <small>Rp350.000</small>
            </div>
            <div class="col-6">
                <p class="mb-1 fw-bold">130 <span style="color: gray; font-size: 0.9rem;">Vcrs</span></p>
                <small>Voucher tersedia</small>
            </div>
        </div>
    </div>
</section>

<!-- Kategori -->
<section id="kategori" class="py-4">
    <div class="container">
        <h5 class="fw-bold mb-3">Kategori</h5>
        <div class="row text-center">
            <!-- Card Kategori -->
            <div class="col-3 mb-3">
                <a href="#" class="text-decoration-none text-dark">
                    <img src="{{ asset('images/image4.jpg') }}" alt="Room" width="200">
                    <p class="mt-2">Room</p>
                </a>
            </div>
            <div class="col-3 mb-3">
                <a href="#" class="text-decoration-none text-dark">
                    <img src="{{ asset('images/image3.jpg') }}" alt="Tempat tidur" width="200">
                    <p class="mt-2">Meja & Kursi</p>
                </a>
            </div>
            <div class="col-3 mb-3">
                <a href="#" class="text-decoration-none text-dark">
                    <img src="{{ asset('images/image2.jpg') }}" alt="Sofa" width="200">
                    <p class="mt-2">Sofa</p>
                </a>
            </div>
            <div class="col-3 mb-3">
                <a href="#" class="text-decoration-none text-dark">
                    <img src="{{ asset('images/imagemejakursi.jpg') }}" alt="Meja dan Kursi" width="200">
                    <p class="mt-2">Tempat Tidur</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Inspirasi -->
<section id="inspirasi" class="py-4 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Inspirasi</h5>
            <a href="#" class="text-decoration-none">More</a>
        </div>
        <div class="row">
            <div class="col-6 mb-3">
                <img src="{{ asset('images/livingroom.jpg') }}" class="img-fluid rounded" alt="Living Room">
            </div>
            <div class="col-6 mb-3">
                <img src="{{ asset('images/diningroom.jpg') }}" class="img-fluid rounded" alt="Dining Room">
            </div>
        </div>
    </div>
</section>
@endsection
