<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('provinsis', 'ProvinsiAPIController');

Route::resource('kotas', 'KotaAPIController');

Route::resource('universitas', 'UniversitasAPIController');

Route::resource('perjalanans', 'PerjalananAPIController');

Route::resource('pegawais', 'PegawaiAPIController');

Route::resource('rekomendasis', 'RekomendasiAPIController');

Route::resource('perjalanan_dinas', 'PerjalananDinasAPIController');