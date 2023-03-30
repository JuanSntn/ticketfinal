@extends('userindex')
@section('title','CLIENTE')
@section('content')
@section('body')

<div class="flex mb-4">
    <div class="w-1/2 p-2 text-center bg-white p-6 shadow-lg">
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
                                Descripcion
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
                            {{ $user->descripcion }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $user->estatus }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $user->id_departamentos }}
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


        <div class="w-1/2 p-2 text-center bg-white p-6 shadow-lgbg-white p-6 shadow-lg">
                  <div class="mt-5 md:col-span-2 md:mt-0">
                    <form method="POST" action="{{route('ticket.store')}}">
                    @csrf
                      <div class="overflow-hidden shadow sm:rounded-md">
                        <div class="bg-white px-4 py-5 sm:p-6">
                          <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                             <p class="text-4xl font-extrabold text-gray-900 dark:text-white">SOLICITAR TICKET</p>
                            </div>

                            <div class="col-span-6 ">
                              <label for="id_departamentos" class="block text-sm font-medium leading-6 text-gray-900">Departamento</label>
                              <select id="id_departamentos" name="id_departamentos" autocomplete="country-name" class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                                @foreach ($departamentos as $departamento)
                                 <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                @endforeach
                            </div>

                            <div class="col-span-6 ">
                                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Descripcion</label>
                                <textarea name="descripcion" id="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripcion"></textarea>
                              </div>


                          </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                          <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
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
