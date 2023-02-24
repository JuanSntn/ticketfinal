<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\HomeController;
use App\Models\User;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', UserController::class);
Route::resource('/moders', ModeradorController::class);


Route::get('/create', function () {
    return view('crearuser');
});

Route::get('/create', function () {
    return view('crearuser');
})->name('crearuser');


Route::post('/home/create', [HomeController::class, 'store'])
->name('home.store');


