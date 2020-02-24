<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//dashboard
Route::get('dashboard', function () {
    return view('admin');
})->middleware('auth');

//tambah barang
Route::view('/tambah_barang','barang.input_barang');
Route::post('/submitData','BarangController@create');

//lihat barang
Route::get('/lihat_barang','BarangController@show');

//hapus barang
Route::delete('/lihat_barang/{id}', ['uses' => 'BarangController@delete']);

//edit barang
Route::view('/edit_barang','barang.edit_barang');
Route::get('/lihat_barang/{id}/edit','BarangController@edit');
Route::patch('/lihat_barang/{id}/update','BarangController@update');

//search barang
Route::get('/cari_barang', 'BarangController@search');

//lihat user
Route::get('/lihat_user','UserController@show');

//edit user
Route::view('/edit_user','user.edit_user');
Route::get('/lihat_user/{id}/edit','UserController@edit');
Route::patch('/lihat_user/{id}/update','UserController@update');

//hapus user
Route::delete('/lihat_user/{id}', ['uses' => 'UserController@delete']);

//search barang
Route::get('/cari_user', 'UserController@search');

//laporan tahunan
Route::get('/laporan_tahunan','LaporanController@show');
Route::get('/laporan_tahunan/download','LaporanController@export')->name('laporan_tahunan.download');
Route::get('/laporan_tahunan/cari', 'LaporanController@search')->name('laporan_tahunan.pertahun');

//laporan bulanan
Route::get('/laporan_bulanan','LaporanController@lihat');
Route::get('/laporan_bulanan/cari', 'LaporanController@cari');
Route::get('/laporan_bulanan/download','LaporanController@export2')->name('laporan_bulanan.download');

Route::view('coba','layouts.menu');



