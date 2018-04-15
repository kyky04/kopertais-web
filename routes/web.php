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
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('provinsis', 'ProvinsiController');

Route::resource('kotas', 'KotaController');

Route::resource('universitas', 'UniversitasController');

Route::resource('perjalanans', 'PerjalananController');

Route::resource('pegawais', 'PegawaiController');

Route::resource('rekomendasis', 'RekomendasiController');

Route::resource('perjalananDinas', 'PerjalananDinasController');