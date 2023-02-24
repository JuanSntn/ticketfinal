@extends('index')
@section('title','SOPORTE DEL SISTEMA')
@section('content') 
@section('body')

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form method="POST" action="{{route('home.store')}}">
            @csrf
            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo">
                    <option value="1">Administrador</option>
                    <option value="2">Soporte</option>
                    <option value="3">Usuario</option>
                </select>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono">
            </div>
            <div>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion">
            </div>
            <div>
                <button type="submit" class='inline-block w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
            </div>

            <a href="{{ url()->previous() }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>




        </form>

@endsection