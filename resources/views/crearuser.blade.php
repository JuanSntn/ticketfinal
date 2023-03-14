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
            <form method="POST" action="{{route('ticket.store')}}">
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


<div class="py-5 "   >
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
        <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg" >
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre del departamento
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Tipo:
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Eliminar
                        </th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->tipo }}
                            </td>
                            <td>
                                <form action="{{ route('borrar.user', $user->id) }}" method="POST" class="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="confirmDelete(event)" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                      </tbody>
                 </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                 <script>
                     function confirmDelete(event) {
                         event.preventDefault(); // Prevenir el comportamiento predeterminado del botón

                         Swal.fire({
                             title: '¿Estás seguro?',
                             text: "Esta acción no se puede deshacer",
                             icon: 'warning',
                             showCancelButton: true,
                             confirmButtonColor: '#d33',
                             cancelButtonColor: '#3085d6',
                             confirmButtonText: 'Sí, borrarlo'
                         }).then((result) => {
                             if (result.isConfirmed) {
                                 // Si se hace clic en el botón de confirmación, enviar el formulario para eliminar el elemento
                                 event.target.form.submit();
                             }
                         })
                     }
                 </script>
@endsection
