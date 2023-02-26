@extends('index')
@section('title','SOPORTE DEL SISTEMA')
@section('content')
@section('body')



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
                                    Autor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Clasificacion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Detalles
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estatus
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Departamento
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>

                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->autor }}
                                </th>
                                <td class="px-6 py-4">
                                {{ $user->fecha }}
                                </td>
                                <td class="px-6 py-4">
                                {{ $user->clasif }}
                                </td>
                                <td class="px-6 py-4">
                                {{ $user->detalles }}
                                </td>
                                <td class="px-6 py-4">
                                {{ $user->estatus }}
                                </td>
                                <td class="px-6 py-4">
                                {{ $user->id_departamentos }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('editar.ticket', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Asignar</a>
                                </td>
                                    <td>
                                        <form action="{{ route('borrar.ticket', $user->id) }}" method="POST" class="formEliminar">
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


