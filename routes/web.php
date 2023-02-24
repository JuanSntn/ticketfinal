<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\departamentos;


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

Route::get('/home/departamento', function () {
    return view('cruddepartamento');
});

Route::post('/home/create', [HomeController::class, 'store'])
->name('home.store');

Route::post('/home/departamento/create', [HomeController::class, 'departamento'])
->name('departamento.store');

Route::get('/home/departamento',[AdminController::class,'index']);



