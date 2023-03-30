@extends('index')
@section('title','SOPORTE DEL SISTEMA')
@section('content')
@section('body')

<div class="py-5 "   >
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
        <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg" >
    <form action="{{ route('update.ticket',$user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
        <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Encargado</label>
        <input name="cargo" id="cargo" value="{{ $user->cargo }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre del encargado" required>
        </div>
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamentos</label>
        <select name="id_departamentos" value="{{$user->id_departamentos  }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($departamentos as $departamento)
            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
        @endforeach
        </select>
        <div class="flex items-start mb-6">
        </div>
        <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
            <input name="descripcion" id="descripcion" value="{{ $user->descripcion }}" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Asignar</button>
  </form>



        </div>
    </div>
</div>



@endsection
