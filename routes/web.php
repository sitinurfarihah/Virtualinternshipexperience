<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\rekomendasiController;
use Illuminate\Support\Facades\Storage;

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
    return redirect('beranda');
});

Route::resource('beranda', BerandaController::class);
Route::resource('rekomendasi', rekomendasiController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::get('kategori/delete/{id}',[KategoriController::class,'delete']);
    
    Route::resource('post', PostController::class);
    Route::get('post/delete/{id}',[PostController::class,'delete']);
    
    Route::resource('produk', ProdukController::class);
    Route::get('produk/delete/{id}',[ProdukController::class,'delete']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('user/delete/{id}',[UserController::class,'delete']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
