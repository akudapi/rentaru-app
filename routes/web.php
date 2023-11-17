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

Route::middleware(['auth'])->group(function(){

    Route::get('/', [App\Http\Controllers\ProdukController::class, 'home'])->name('login');
    Route::get('/home', [App\Http\Controllers\ProdukController::class, 'home'])->name('home');
    Route::get('/home/create', [App\Http\Controllers\ProdukController::class, 'createView'])->name('createView');
    Route::post('/create', [App\Http\Controllers\ProdukController::class, 'createLogic'])->name('createLogic');
    Route::get('/home/produk/{id}', [App\Http\Controllers\ProdukController::class, 'produkView'])->name('produkView');
    Route::post('/home/produk/{id}/komentar', [App\Http\Controllers\ProdukController::class, 'komentarLogic'])->name('komentarLogic');
    Route::get('/home/favorite', [App\Http\Controllers\ProdukController::class, 'favoriteView'])->name('favoriteView');
    Route::post('/addToFavorite/{produk_id}', [App\Http\Controllers\FavoriteController::class, 'addToFavorite'])->name('addToFavorite');
    Route::post('/removeFromFavorite/{produk}', [App\Http\Controllers\FavoriteController::class, 'removeFromFavorite'])->name('removeFromFavorite');





});


Auth::routes();

