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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['role:admin']], function() {
    Route::resource('/user','userController');
    Route::get('/user/hapus/{id}','userController@destroy');
    Route::resource('/barang','barangController');
    Route::get('/barang/hapus/{id}','barangController@destroy');
    Route::resource('/resep', 'resepController');
    Route::get('/resep/hapus/{id}','resepController@destroy');
    Route::resource('/akun', 'akunController');
    Route::get('/akun/hapus/{id}','akunController@destroy');
    Route::resource('/setting', 'SettingController');
    //Penjualan
    Route::get('/transaksi', 'PenjualanController@index')->name('penjualan.transaksi');
    Route::post('/sem/store', 'PenjualanController@store');
    Route::get('/transaksi/hapus/{kd_brg}','PenjualanController@destroy');
    //Detail Penjualan
    Route::post('/detail/store', 'DetailPenjualanController@store');
    Route::post('/detail/simpan', 'DetailPenjualanController@simpan');
    //data penjualan
    Route::get('/datapenjualan', 'DatapenjualanController@index')->name('datapenjualan.transaksi');
    Route::get('/datapenjualan-jual/{id}', 'DatapenjualanController@edit');
    Route::post('/datapenjualan/simpan', 'DatapenjualanController@simpan');
    Route::get('/datapenjualan/{id}', 'DatapenjualanController@pdf')->name('cetak.order_pdf');
    Route::get('/detailPenjualan/{id}', 'DatapenjualanController@detailPenjualan')->name('detailPenjualan');
    //Retur  
    Route::get('/retur','ReturController@index')->name('retur.transaksi');
    Route::get('/retur-jual/{id}', 'ReturController@edit');
    Route::post('/retur/simpan', 'ReturController@simpan');
});
//
{//Laporan
Route::resource( '/laporan' , 'LaporanController'); 
Route::resource( '/stok' , 'LapStokController'); 
//laporan cetak
Route::get('/laporancetak/cetak_pdf', 'LaporanController@cetak_pdf');
Route::get('/laporanlappenj/lappenj_pdf', 'LaporanController@lappenj_pdf');
Route::get('/laporankasmasuk/kasmasuk_pdf', 'LaporanController@kasmasuk_pdf');
Route::get('/laporanlapobt/lapobt_pdf', 'LaporanController@lapobt_pdf');
}

Route::get('/api-barang', 'ApiController@barang')->name('apiBarang');;