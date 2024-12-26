@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Pesanan Pelanggan') }}</div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Pelanggan</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Jumlah Pesanan</th>
                                    <th class="text-center">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pesanans as $b)
                                <tr>
                                    <td class="text-center">{{ $b->user->name }}</td>
                                    <td class="text-center">{{ $b->barang->nama }}</td>
                                    <td class="text-center">{{ $b->quantity }}</td>
                                    <td class="text-center">{{ $b->sub_total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
