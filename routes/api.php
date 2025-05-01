<?php

use App\Http\Controllers\Api\TProductController;
use App\Http\Controllers\Api\MKategoriController;
use App\Http\Controllers\Api\TTransaksiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

Route::prefix('product')->group(function () {
  Route::get('/', [TProductController::class, 'index']);
  Route::get('/{id}', [TProductController::class, 'show']);
  Route::post('/', [TProductController::class, 'store']);
  Route::put('/update/{id}', [TProductController::class, 'update']);
  Route::put('/delete/{id}', [TProductController::class, 'destroy']);
});

Route::prefix('mkategori')->group(function () {
  Route::get('/', [MKategoriController::class, 'index']);
  Route::get('/{id}', [MKategoriController::class, 'show']);
  Route::post('/', [MKategoriController::class, 'store']);
  Route::put('/update/{id}', [MKategoriController::class, 'update']);
  Route::put('/delete/{id}', [MKategoriController::class, 'destroy']);
});

Route::prefix('transaksi')->group(function () {
  Route::get('/', [TTransaksiController::class, 'index']);
  Route::get('/{id}', [TTransaksiController::class, 'show']);
  Route::post('/', [TTransaksiController::class, 'store']);
  Route::put('/update/{id}', [TTransaksiController::class, 'update']);
  Route::put('/delete/{id}', [TTransaksiController::class, 'destroy']);
});