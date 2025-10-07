<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TestController::class, 'showAll']);
Route::get('/task/{id}', [TestController::class, 'showOne']);