<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.index');
});

Route::get('/belanja', function () {
    return view('layout.belanja');
});

Route::get('/login', function () {
    return view('layout.login');
});

Route::get('/daftar', function () {
    return view('layout.daftar');
});

Route::get('/belanja', 'HomeController@index');


//======================Akun Pembeli============
Route::get('/pembeli/DashboardPembeli', 'PembeliController@index');
Route::get('/index', 'PembeliController@loginPage');
Route::post('/login', 'PembeliController@login');
Route::get('/registerPage', 'PembeliController@registerPage');
Route::post('/registerPembeli', 'PembeliController@registerPembeli');
Route::get('/logout', 'PembeliController@logout');

//==================Pemesanan Batik==============
Route::get('/pembeli/DashboardPembeli', 'PembelianController@index');
Route::get('/pembeli/detail_produk{id}', 'PembelianController@detail');
Route::get('/pembeli/DashboardPembeli/cari', 'PembelianController@cari');
Route::post('/pesan/{id}', 'PembelianController@beliProduk');
Route::get('/pembeli/keranjang', 'PembelianController@index_checkOut');
Route::delete('/pembeli/keranjang/{id}', 'PembelianController@deleteKeranjang');
Route::post('/add-konfirmasi/{id}', 'PembelianController@konfirmasi');
Route::get('/pembeli/riwayat_beli', 'PembelianController@tampilRiwayat');
Route::get('history/{id}', 'PembelianController@riwayatDetail');
Route::post('buktiTf/{id}', 'PembelianController@buktiTf');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/data-pemesanan', 'PemesananController@index')->name('dataPemesanan');
    Route::get('/data-pembayaran', 'PembayaranController@index')->name('dataPembayaran');
    Route::get('/data-penjualan', function () {
        return view('admin.penjualan');
    })->name('dataPenjualan');
});
