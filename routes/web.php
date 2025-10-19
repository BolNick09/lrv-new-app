<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    return view('welcome', ['name' => 'Никита']);
});

Route::get('/tasks', [TestController::class, 'showAll']);
Route::get('/task/{id}', [TestController::class, 'showOne']);
Route::get('/task/edit/{id}', [TestController::class, 'showEdit']);