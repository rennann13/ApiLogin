<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rota pública
Route::post('/', [LoginController::class, 'login'])->name('login');

//Rota restrita
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/logout/{user}', [LoginController::class, 'logout']);
});