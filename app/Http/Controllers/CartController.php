<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $carts = Cart::with('barang')->where('user_id', $user->id)->get();

        return view('pelanggan.keranjang', compact('carts'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $barang_id = $request->id;
        $quantity = (int)$request->jumlah_pesanan;

        $cart = Cart::where('user_id', $user->id)->where('barang_id', $barang_id)->first();
        $barang = Barang::find($barang_id);

        if ($quantity > $barang->stok) {
            return redirect()->back()->with('error', 'Jumlah pesanan melebihi stok barang');
        }

        if ($cart) {
            $cart->quantity += $quantity;
            $cart->sub_total = $cart->quantity * $barang->harga;
            $cart->save();
        } else {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->barang_id = $barang_id;
            $cart->quantity = $quantity;
            $cart->sub_total = $quantity * $barang->harga;
            $cart->save();
        }

        return redirect()->route('cart.index')->with('success', 'Barang berhasil ditambahkan ke keranjang');
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Barang berhasil dihapus dari keranjang');
    }
}
