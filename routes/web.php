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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

    Route::group(['prefix' => 'Pegawai', 'middleware' => ['role:pegawai']], function(){
        Route::get('/absensi', 'App\Http\Controllers\AbsenController@index')->name('absensi');
        Route::get('/absensi_masuk', 'App\Http\Controllers\AbsenController@absen_masuk')->name('absensi_masuk');
        Route::get('/absensi_keluar', 'App\Http\Controllers\AbsenController@absen_keluar')->name('absensi_keluar');
        
        Route::get('/cuti', 'App\Http\Controllers\AbsenController@index_cuti')->name('cuti');
        Route::get('/input-cuti', 'App\Http\Controllers\AbsenController@cuti_form')->name('cuti_form');
        Route::post('/simpan-cuti', 'App\Http\Controllers\AbsenController@simpan_cuti')->name('simpan_cuti');
    });

    Route::group(['prefix' => 'HRD', 'middleware' => ['role:hrd' ]], function(){
        Route::get('/laporan-absensi', 'App\Http\Controllers\ManajerController@laporan_absensi')->name('laporan_absensi');
        Route::get('/laporan-cuti', 'App\Http\Controllers\ManajerController@laporan_cuti')->name('laporan_cuti');
    });

    Route::group(['prefix' => 'Manajer','middleware' => ['role:manajer']], function(){
        Route::get('/laporan-absensi', 'App\Http\Controllers\ManajerController@laporan_absensi')->name('laporan_absensi');
        Route::get('/laporan-cuti', 'App\Http\Controllers\ManajerController@laporan_cuti')->name('laporan_cuti');
        Route::get('/pengajuan-cuti-pegawai', 'App\Http\Controllers\ManajerController@pengajuan_cuti_pegawai')->name('pengajuan_cuti_pegawai');
        Route::get('/acc-pengajuan-cuti-pegawai/{id}', 'App\Http\Controllers\ManajerController@acc_pengajuan_cuti_pegawai')->name('acc_pengajuan_cuti_pegawai');

    });
});
