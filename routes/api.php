<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api' , function (Request $request) {
    return $request->user();
});

route::get('absensi-pegawai/{id}', 'App\Http\Controllers\Api\PegawaiController@index');
route::get('absensi-masuk/{id}', 'App\Http\Controllers\Api\PegawaiController@absen_masuk');
route::get('absensi-keluar/{id}', 'App\Http\Controllers\Api\PegawaiController@absen_keluar');
