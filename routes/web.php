<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('agent',AgentController::class);
Route::post('/agent-sale{id}',[AgentController::class,'sale'])->name('agent.sale');
Route::resource('product',ProductController::class);
