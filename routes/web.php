<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Models\User;
use App\Models\departamentos;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/users', function () {



})->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', [App\Http\Controllers\UsuarioController::class, 'index'])->name('crearuser');


Route::resource('/moders', ModeradorController::class);
Route::resource('/users', UserController::class);


Route::get('/home/departamento', function () {
    return view('cruddepartamento');
});

Route::post('/home/create', [HomeController::class, 'store'])
->name('home.store');

Route::post('/ticket/create', [UserController::class, 'store'])
->name('ticket.store');

Route::post('/home/departamento/create', [HomeController::class, 'departamento'])
->name('departamento.store');

Route::get('/home/departamento',[AdminController::class,'index']);


Route::delete('/usuario/{id}',[AdminController::class, 'destroy'])->name('borrar.usuario');

Route::delete('/ticket/{id}',[HomeController::class, 'destroy'])->name('borrar.ticket');

Route::delete('/user/{id}',[UsuarioController::class, 'destroy'])->name('borrar.user');

Route::get('/ticket/{id}/asignar',[HomeController::class,'edit'])->name('editar.ticket');

Route::get('/ticket/{id}/asignar',[HomeController::class,'edit'])->name('editar.ticket');

Route::put('/ticket/{id}/actualizar',[HomeController::class,'update'])->name('update.ticket');

