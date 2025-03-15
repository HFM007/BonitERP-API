<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TProductController;

Route::get('/', function () {
  return view('welcome');
});

// Route::get('/product', [TProductController::class, 'index']);
// Route::get('/product/{id}', [TProductController::class, 'show']);
// Route::post('/product', [TProductController::class, 'store']);
// Route::put('/product/update/{id}', [TProductController::class, 'update']);
// Route::put('/product/delete/{id}', [TProductController::class, 'destroy']);
