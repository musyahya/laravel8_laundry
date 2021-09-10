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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class);
    Route::get('/karyawan', \App\Http\Livewire\Karyawan::class);
    Route::get('/layanan', \App\Http\Livewire\Layanan::class);
    Route::get('/transaksi', \App\Http\Livewire\Transaksi::class);
    Route::get('/progres', \App\Http\Livewire\Progres::class);
});
