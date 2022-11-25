<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ThematicController;
use App\Http\Controllers\UserController;

// Routas Table
    // ESPECIFIC ROUTES
        // Route::get('table', [TableController::class, 'index']);
        // Route::post('table', [TableController::class, 'store']);
        // Route::get('table/{id}', [TableController::class, 'show']);
        // Route::put('update/{id}', [TableController::class, 'update']);
        // Route::delete('delete/{id}', [TableController::class, 'destroy']);
        Route::post('table_sv', [TableController::class, 'store_sin_valid']);
        Route::put('table_sv/{id}', [TableController::class, 'update_sin_valid']);

// Routas Thematic
    // ESPECIFIC ROUTES
        // Route::get('thematic', [ThematicController::class, 'index']);
        // Route::post('thematic', [ThematicController::class, 'store']);
        // Route::get('thematic/{id}', [ThematicController::class, 'show']);
        // Route::put('thematic/{id}', [ThematicController::class, 'update']);
        // Route::delete('thematic/{id}', [ThematicController::class, 'destroy']);
        Route::post('thematic_sv', [ThematicController::class, 'store_sin_valid']);
        Route::put('thematic_sv/{id}', [ThematicController::class, 'update_sin_valid']);
  
        




 // ALL ROUTES
 Route::resource('table', TableController::class);
 Route::resource('thematic', ThematicController::class);
 Route::resource('user', UserController::class);