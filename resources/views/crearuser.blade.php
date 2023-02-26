@extends('index')
@section('title','SOPORTE DEL SISTEMA')
@section('content')
@section('body')
@vite(['resources/css/app.css','resources/js/app.js'])


<div class="container pl-20 flex items-center justify-center"> 
            <div class=" col-md-8 px-52">

            <div class=" card bg-blue-200 text-right h-100 ">
            <div class="card-header bg-blue-400 text-center py-2">{{ __('CREAR USUARIO') }}</div>
            <div class="px-60">
            <div class="card-body py-5 ">
            <form method="POST" action="{{route('home.store')}}">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Nombre:</label>
                <input type="text" name="name" id="name" class="bg-blue-50">
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>
                <input type="email" name="email" id="email" class="bg-blue-50">

            </div>

            <div class="row mb-3">
                <label for="tipo" class="col-md-4 col-form-label text-md-end">Tipo:</label>
                <select name="tipo" id="tipo" class="bg-blue-50 px-14">
                    <option value="1">Administrador</option>
                    <option value="2">Soporte</option>
                    <option value="3">Usuario</option>
                </select>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña:</label>
                <input type="password" name="password" id="password" class="bg-blue-50">
            </div>

            <div class="row mb-3">
                <label for="telefono" class="col-md-4 col-form-label text-md-end">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" class="bg-blue-50">
            </div>

            <div class="row mb-3">
                <label for="direccion" class="col-md-4 col-form-label text-md-end">Dirección:</label>
                <input type="text" name="direccion" id="direccion" class="bg-blue-50">
            </div>

            <div class="row mb-3">
                <button type="submit" class='text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2'>
                    Guardar
                </button>
                <a href="{{ url()->previous() }}" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Cancelar
            </a>
            </div>
        </div>
        </div>

</div>


        </form>

@endsection
