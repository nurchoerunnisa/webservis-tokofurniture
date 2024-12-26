@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Barang') }}</div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example" class="table table-striped table-hover table-bordered">
                            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Data</a>

                            <thead>
                                <tr>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $b)
                                <tr>
                                    <td class="text-center"><img src="{{ asset('img/'.$b->gambar) }}" width="50px" height="50px"></td>
                                    <td class="text-center">{{ $b->nama }}</td>
                                    <td class="text-center">{{ $b->harga }}</td>
                                    <td class="text-center">{{ $b->stok }}</td>
                                    <td class="text-center">{{ $b->alamat }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('barang.destroy', $b->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
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
