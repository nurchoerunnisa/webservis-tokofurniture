<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Socialite Auth
 */
Route::get('/auth/redirect', [App\Http\Controllers\Auth\SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/callback', [App\Http\Controllers\Auth\SocialiteController::class, 'handleProvideCallback']);

/**
 * Barang
 */
Route::resource('barang', App\Http\Controllers\BarangController::class)->except(['edit']);
Route::get('data-barang', [App\Http\Controllers\BarangController::class, 'dataBarang'])->name('data-barang');
Route::get('barang/{id}/edit', [App\Http\Controllers\BarangController::class, 'edit'])->name('barang.edit');
Route::get('furniture', [App\Http\Controllers\FurnitureController::class, 'index'])->name('furniture.index');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

/**
 * Pelanggan
 */
Route::resource('pelanggan', App\Http\Controllers\PelangganController::class)->except(['edit']);
Route::get('pelanggan/{id}/edit', [App\Http\Controllers\PelangganController::class, 'edit'])->name('pelanggan.edit');

/**
 * Cek Ongkir
 */
Route::resource('cek-ongkir', App\Http\Controllers\CekOngkirController::class)->only(['index', 'store']);

/**
 * Profile
 */
Route::resource('profile', App\Http\Controllers\ProfileController::class)->only(['index', 'update']);
Route::get('profile/{id}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

/**
 * Cart
 */
Route::resource('cart', App\Http\Controllers\CartController::class)->only(['index', 'store', 'destroy']);

/**
 * Order
 */
Route::post('order/orderLangsung', [App\Http\Controllers\OrderController::class, 'orderLangsung'])->name('order.orderLangsung');
Route::get('order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::get('pesanan', [App\Http\Controllers\OrderController::class, 'semuaPesanan'])->name('order.semuaPesanan');
Route::get('pesanan-pelanggan', [App\Http\Controllers\OrderController::class, 'pesananPelanggan'])->name('order.pesananPelanggan');
