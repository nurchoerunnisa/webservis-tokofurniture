@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($data as $no => $value)
                <div class="col-md-3">
                    <div class="card" style="margin-bottom:40px;">
                        <img class="card-img-top" src="{{ asset('img/'.$value->gambar) }}" alt="Card image cap"
                            width="50%;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $value->nama }}</h5>
                            <p class="card-text">
                                <strong>
                                    Harga : <strong>Rp {{ number_format($value->harga) }}</strong>
                                </strong>
                            </p>
                        </div>
                        <div class="card-footer">
                            {{-- beli langsung --}}
                            <form method="POST" action="{{ route('order.orderLangsung') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $value->id }}">
                                <input type="hidden" name="jumlah_pesanan" value="1">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i> Beli Langsung
                                </button>
                            </form>

                            {{-- tambah ke keranjan --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#pesan{{ $value->id }}">
                                <i class="fa fa-shopping-cart"></i> Tambah ke Keranjang
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($data as $no => $value)
                <div class="modal fade" id="pesan{{ $value->id }}" tabindex="-1" aria-labelledby="pesan"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pesan Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="card-img-top" src="{{ asset('img/'.$value->gambar) }}"
                                            alt="" width="10%;">
                                    </div>
                                    <div class="col-md-6">
                                        <h3>{{ $value->nama }}</h3>
                                        <table class="table">
                                            <tbody>
                                                {{-- add to cart --}}
                                                <form method="POST" action="{{ route('cart.store') }}">
                                                    @csrf
                                                    <tr>
                                                        <td>ID Produk</td>
                                                        <td>:</td>
                                                        <td><input id="id" type="text" placeholder="ID Produk"
                                                                class="form-control @error('id') is-invalid @enderror"
                                                                name="id" value="{{ $value->id }}" required
                                                                autofocus readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Produk</td>
                                                        <td>:</td>
                                                        <td><input id="nama" type="text" placeholder="Nama Produk"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                name="nama" value="{{ $value->nama }}" required
                                                                autofocus readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga</td>
                                                        <td>:</td>
                                                        <td><input id="harga" type="number" placeholder="Harga"
                                                                class="form-control @error('harga') is-invalid @enderror"
                                                                name="harga" value="{{ $value->harga }}" required
                                                                autofocus readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stok</td>
                                                        <td>:</td>
                                                        <td><input id="stok" type="number" min="0"
                                                                placeholder="Stok"
                                                                class="form-control @error('stok') is-invalid @enderror"
                                                                name="stok" value="{{ $value->stok }}" required
                                                                autofocus readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Berat</td>
                                                        <td>:</td>
                                                        <td><input id="berat" type="number" placeholder="Berat"
                                                                class="form-control @error('berat') is-invalid @enderror"
                                                                name="berat" value="{{ $value->berat }}" required
                                                                autofocus readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td><input id="alamat" type="text" placeholder="Alamat"
                                                                class="form-control @error('alamat') is-invalid @enderror"
                                                                name="alamat" value="{{ $value->alamat }}" required
                                                                autofocus readonly>
                                                        </td>
                                                    </tr>
                                                    <td>Jumlah Pesan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input id="jumlah_pesanan" type="number" min="1"
                                                            placeholder="Jumlah Pesanan"
                                                            class="form-control @error('jumlah_pesanan') is-invalid @enderror"
                                                            name="jumlah_pesanan" value="{{ $value->jumlah_pesanan }}"
                                                            required autofocus>
                                                        @error('jumlah_pesanan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                    </tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div>
                                                            <input class="btn btn-primary" type="submit"
                                                                value="Tambah ke Keranjang"
                                                                style="width: 100%; margin-top: 10px;">
                                                        </div>
                                                    </td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endsection
