<?php

use App\Http\Controllers\Api\TProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');


Route::get('/product', [TProductController::class, 'index']);
Route::get('/product/{id}', [TProductController::class, 'show']);
Route::post('/product', [TProductController::class, 'store']);
Route::put('/product/{id}', [TProductController::class, 'update']);
Route::put('/product/{id}', [TProductController::class, 'destroy']);