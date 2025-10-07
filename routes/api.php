<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class)
                    ->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/test', function () {
    return response()->json(['status' => 'API funciona!']);
});

Route::apiResource('categories', \App\Http\Controllers\CategoryController::class)
                    ->middleware('auth:sanctum');

Route::get('/active-categories', [\App\Http\Controllers\CategoryController::class, 'getActiveCategories'] )
                    ->middleware('auth:sanctum');