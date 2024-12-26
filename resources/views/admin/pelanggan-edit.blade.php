@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pelanggan</h1>
        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama" name="name" value="{{ $pelanggan->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $pelanggan->email }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Pelanggan</button>
        </form>
    </div>
@endsection
