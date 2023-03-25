@extends('index')
@section('title','SOPORTE DEL SISTEMA')
@section('content')
@section('body')
@vite(['resources/css/app.css','resources/js/app.js'])
<center>
    <br><br><br>

<div class="justify-center">

<div class="w-full max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
    <div class="flex justify-end px-4 pt-4">
<br><br>

    </div>
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/img/perfil3.png" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"> Nombre: {{ Auth::user()->name }}</h5>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"> Teléfono: {{ Auth::user()->telefono }}</h5>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"> Dirección: {{ Auth::user()->direccion }}</h5>

        <div class="flex mt-4 space-x-3 md:mt-6">
            <a href="{{ route('editar.usuario') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Editar perfil</a>

        </div>
    </div>
</div>
@endsection
