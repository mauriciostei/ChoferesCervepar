<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
    Route::get('/', function(){ return redirect()->route('loginForm'); });
    Route::get('/login', [UsersController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [UsersController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function(){

    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
    Route::get('/password', [UsersController::class, 'password'])->name('passwordChange');
    Route::post('/password/{user}', [UsersController::class, 'passwordReset'])->name('passwordReset');
    
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/formularioPlanes/{viaje}', [PlanesController::class, 'form'])->name('editPlanes');
    Route::post('/formularioPlanes', [PlanesController::class, 'guardarCambios'])->name('postPlanes');
});