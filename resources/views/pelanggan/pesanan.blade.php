@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pesanan') }}</div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="example" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Tanggal Order</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanans as $ps)
                                        <tr>
                                            <td class="text-center">{{ $ps->id }}</td>
                                            <td class="text-center">{{ $ps->created_at }}</td>
                                            <td class="text-center">{{ $ps->sub_total }}</td>
                                            <td class="text-center">{{ $ps->status }}</td>
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
