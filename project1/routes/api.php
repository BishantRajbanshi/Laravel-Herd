<?php

use App\Http\Controllers\TaskController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


        Route::get('users',[UserController::class, 'index']);
        Route::get('users/{user}',[UserController::class, 'show']);
        Route::post('users',[UserController::class, 'store']);
        Route::put('users/{id}',[UserController::class, 'update']);
        Route::delete('users/{id}',[UserController::class, 'destroy']);


        Route::get('products',[ProductController::class, 'index']);
        Route::post('products',[ProductController::class, 'store']);
        Route::put('products/{Title}',[ProductController::class, 'update']);
        Route::delete('products/{Title}',[ProductController::class, 'destroy']);