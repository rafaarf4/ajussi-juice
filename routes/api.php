<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\PesananController;
use App\Http\Controllers\Api\StatistikController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\UlasanController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/
Route::get('/users', [UserController::class, 'index']);


/*
|--------------------------------------------------------------------------
| PRODUK
|--------------------------------------------------------------------------
*/
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{produk}', [ProdukController::class, 'show']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::put('/produk/{produk}', [ProdukController::class, 'update']);
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy']);



/*
|--------------------------------------------------------------------------
| PESANAN (ADMIN)
|--------------------------------------------------------------------------
*/
Route::get('/pesanan', [PesananController::class, 'index']);
Route::get('/pesanan/{id}', [PesananController::class, 'show']);
Route::put('/pesanan/{id}', [PesananController::class, 'update']);
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy']);


/*
|--------------------------------------------------------------------------
| PESANAN USER
|--------------------------------------------------------------------------
*/
Route::post('/pesanan', [PesananController::class, 'store']); // umum
Route::post('/pesanan-user', [PesananController::class, 'storeUser']); // keranjang
Route::get('/pesanan-user/{id_user}', [PesananController::class, 'userOrders']);



/*
|--------------------------------------------------------------------------
| PEMBAYARAN
|--------------------------------------------------------------------------
*/
Route::post('/pesanan/{id}/payment', [PesananController::class, 'uploadPayment']);



/*
|--------------------------------------------------------------------------
| ULASAN
|--------------------------------------------------------------------------
*/
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');



/*
|--------------------------------------------------------------------------
| STATISTIK ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/statistik', [StatistikController::class, 'index']);



/*
|--------------------------------------------------------------------------
| PDF EXPORT
|--------------------------------------------------------------------------
*/
Route::get('/pesanan/pdf', [PesananController::class, 'downloadPdf']);
