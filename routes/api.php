<?php

use App\Http\Controllers\Api\TProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

Route::prefix('product')->group(function () {
  Route::get('/', [TProductController::class, 'index']);
  Route::get('/{id}', [TProductController::class, 'show']);
  Route::post('/', [TProductController::class, 'store']);
  Route::put('/{id}', [TProductController::class, 'update']);
  Route::put('/{id}', [TProductController::class, 'destroy']);
});