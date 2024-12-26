<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // create order by user cart
        $user = auth()->user();
        $carts = $user->carts;

        // perulangan untuk memasukkan data cart ke order
        foreach ($carts as $cart) {
            Order::create([
                'user_id' => $user->id,
                'barang_id' => $cart->barang_id,
                'quantity' => $cart->quantity,
                'sub_total' => $cart->barang->harga * $cart->quantity,
                'status' => 'pending'
            ]);

            // update product stock
            $product = Barang::where('id', $cart->barang_id)->first();
            $product->stok = $product->stok - $cart->quantity;
            $product->save();
        }

        // delete cart
        $user->carts()->delete();

        return redirect()->route('cart.index')->with('success', 'Order berhasil dibuat');
    }

    public function orderLangsung(Request $request)
    {
        // create order by user input
        $user = auth()->user();
        $product = Barang::where('id', $request->product_id)->first();
        $jumlahPesanan = $request->jumlah_pesanan;

        Order::create([
            'user_id' => $user->id,
            'barang_id' => $product->id,
            'quantity' => $jumlahPesanan,
            'sub_total' => $product->harga * $jumlahPesanan,
            'status' => 'pending'
        ]);

        return redirect()->route('furniture.index')->with('success', 'Order berhasil dibuat');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function semuaPesanan()
    {
        $pesanans = Order::where('user_id', auth()->user()->id)->get();

        return view('pelanggan.pesanan', compact('pesanans'));
    }

    public function pesananPelanggan()
    {
        $pesanans = Order::with('user', 'barang')->get();

        return view('admin.pesanan', compact('pesanans'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
