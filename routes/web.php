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

// Route Admin
Route::get('admin/dashboard', 'AdminController@dashboard');
Route::get('admin/pengepul', 'AdminController@pengepul');
Route::get('admin/pengumpul', 'AdminController@pengumpul');
Route::post('admin/tarik', 'AdminController@tarik');
Route::post('admin/status/{id}', 'AdminController@status');

// Route Pengepul
Route::get('pengepul/dashboard', 'PengepulController@dashboard');
Route::get('pengepul/kirim', 'PengepulController@kirim');
Route::post('pengepul/kirim', 'PengepulController@store');
Route::get('pengepul/histori', 'PengepulController@histori');

// Route Pengumpul
Route::get('pengumpul/dashboard', 'PengumpulController@dashboard');
Route::get('pengumpul/histori', 'PengumpulController@histori');

Route::get('/home', 'AdminController@dashboard')->name('home');
