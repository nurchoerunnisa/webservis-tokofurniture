@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Keranjang') }}</div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="example" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Jumlah Pesanan</th>
                                        <th class="text-center">Berat Barang</th>
                                        <th class="text-center">Sub Total</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $c)
                                        <tr>
                                            <td class="text-center"><img src="{{ asset('img/'.$c->barang->gambar) }}"
                                                    width="50px" height="50px"></td>
                                            <td class="text-center">{{ $c->barang->nama }}</td>
                                            <td class="text-center">{{ $c->quantity }}</td>
                                            <td class="text-center">{{ $c->barang->berat }}</td>
                                            <td class="text-center">{{ $c->sub_total }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('cart.destroy', $c->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- tombol checkout --}}
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-center">Total</td>
                                        <td class="text-center">{{ $carts->sum('sub_total') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('order.index') }}" class="btn btn-primary">Checkout</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
