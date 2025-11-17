<?php

use App\Http\Controllers\{TestController, HomeController};
use Illuminate\Support\Facades\{Route, Auth};


Route::get('/', function () 
{
    return view('welcome', ['name' => 'Никита']);
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/tasks', [TestController::class, 'showAll']);
    Route::get('/task/{id}', [TestController::class, 'showOne']);
    Route::get('/task/edit/{id}', [TestController::class, 'showEdit']);
    Route::get('/task/create', [TestController::class, 'showCreate']);

    Route::get('/profile', [HomeController::class, 'profile']);

    Route::post('/task/create', [TestController::class, 'insert']);
    Route::post('/task/update', [TestController::class, 'update']);
    Route::delete('/task/delete/{id}', [TestController::class, 'delete']);



});

    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');

