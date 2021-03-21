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

Route::group(['prefix' => 'admin'], function()
{
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/data-pemesanan', 'PemesananController@index')->name('dataPemesanan');
    Route::get('/data-pembayaran', 'PembayaranController@index')->name('dataPembayaran');
    Route::get('/data-penjualan', function () {
        return view('admin.penjualan');
    })->name('dataPenjualan');
});
