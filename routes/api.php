<?php

use App\Http\Controllers\Api\TProductController;
use App\Http\Controllers\Api\MKategoriController;
use App\Http\Controllers\Api\TTransaksiController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
  Route::post('/register', [RegisterController::class, '__invoke']);
  Route::post('/login', [LoginController::class, '__invoke']);
  // Route::post('/logout', [LogoutController::class, '__invoke'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
  Route::apiResource('product', TProductController::class);
  Route::apiResource('mkategori', MKategoriController::class);
  Route::apiResource('transaksi', TTransaksiController::class);
});
