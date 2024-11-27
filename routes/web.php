<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('agent',AgentController::class);
Route::resource('product',ProductController::class);
Route::resource('order',OrderController::class);
