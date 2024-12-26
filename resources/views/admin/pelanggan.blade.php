@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Pelanggan') }}</div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example" class="table table-striped table-hover table-bordered">
                            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Data</a>

                            <thead>
                                <tr>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggan as $p)
                                <tr>
                                    <td class="text-center"><img src="{{ asset('img/'.$p->gambar) }}" width="50px" height="50px"></td>
                                    <td class="text-center">{{ $p->name }}</td>
                                    <td class="text-center">{{ $p->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('pelanggan.destroy', $p->id) }}" method="post" class="d-inline">
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
