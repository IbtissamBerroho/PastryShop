<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductsController;
use App\Http\Controllers\api\MessageController;
use App\Http\Controllers\api\FeaturesController;
use App\Http\Controllers\api\CommandsController;

Route::apiResource('produits', ProductsController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('features', FeaturesController::class);
Route::apiResource('commands', CommandsController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
