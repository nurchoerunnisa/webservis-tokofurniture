@extends('layouts.app')

@section('content')
    @php
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.rajaongkir.com/starter/city',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => ['key: 50a01dc78918e765d3f2cac342e671fc'],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo 'cURL Error #:' . $err;
        } else {
            $data = json_decode($response);
        }
    @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cek Ongkos Kirim</div>

                    <div class="card-body">
                        <form action="{{ route('cek-ongkir.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_debug_route" value="cekongkir">
                            <div class="mb-3">
                                <label for="kota_asal" class="form-label">Kota Asal:</label>
                                <select name="kota_asal" class="form-control">
                                    <option>- Pilih Kota -</option>
                                    <?php
                                    if (isset($data->rajaongkir->results)) {
                                        foreach ($data->rajaongkir->results as $city) {
                                            echo "<option value=\"$city->city_id\">$city->city_name</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kota_tujuan" class="form-label">Kota Tujuan:</label>
                                <select name="kota_tujuan" class="form-control">
                                    <option>- Pilih Kota -</option>
                                    <?php
                                    if (isset($data->rajaongkir->results)) {
                                        foreach ($data->rajaongkir->results as $city) {
                                            echo "<option value=\"$city->city_id\">$city->city_name</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat:</label>
                                <input type="number" placeholder="Satuan Gram" name="berat" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="kurir" class="form-label">Kurir:</label>
                                <select name="kurir" class="form-control">
                                    <option>- Pilih Kurir -</option>
                                    <option>jne</option>
                                    <option>pos</option>
                                    <option>tiki</option>
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>

                        @if (!empty($ongkir->rajaongkir->results))
                            @foreach ($ongkir->rajaongkir->results[0]->costs as $ongkos)
                                @php
                                    $paket = $ongkos->service;
                                    $ongkos = $ongkos->cost[0]->value;
                                @endphp
                                <div class='alert alert-info'>
                                    <p>Kota Asal : {{ $data->rajaongkir->results[0]->city_name }}</p>
                                    <p>Kota Tujuan : {{ $data->rajaongkir->results[1]->city_name }}</p>
                                    <p>Berat : {{ $berat }}</p>
                                    <p>Paket : {{ $paket }}</p>
                                    <p>Ongkos Kirim : Rp {{ number_format($ongkos, 0) }}</p>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
