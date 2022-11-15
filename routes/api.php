<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;

// ESPECIFIC ROUTES
Route::get('findall', [TableController::class, 'index']);
Route::post('add', [TableController::class, 'store']);
Route::get('findOne/{id}', [TableController::class, 'show']);
Route::put('update/{id}', [TableController::class, 'update']);
Route::delete('delete/{id}', [TableController::class, 'destroy']);
Route::post('add2', [TableController::class, 'store_sin_valid']);
Route::put('update2/{id}', [TableController::class, 'update_sin_valid']);

// ALL ROUTES
Route::resource('crud', TableController::class);