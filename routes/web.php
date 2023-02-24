<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModeradorController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', UserController::class);
Route::resource('/moders', ModeradorController::class);
/* Route::resource('/ticket', TicketController::class); */

Route::get('/ticket', function () {
    return view('ticket');
});

Route::get('/asignarticket', function () {
    return view('asignarticket');
});