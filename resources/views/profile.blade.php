@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Profile
                        <img src="{{ asset('img/' . $user->gambar) }}" alt="{{ $user->name }}" class="img-thumbnail" width="100" />
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ $user->name }}" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="join_since" class="form-label">Bergabung Sejak:</label>
                                <input type="text" name="join_since" class="form-control" value="{{ $user->created_at->diffForHumans() }}" readonly/>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Hak Akses:</label>
                                <input type="text" name="role" class="form-control" value="{{ $role }}" readonly/>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
