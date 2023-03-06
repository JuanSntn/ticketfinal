@extends('layouts.app')
@section('content')
@vite(['resources/css/app.css','resources/js/app.js'])
<div class="container bg-purple-400">
    <div class="row justify-content-center bg-purple-400">
        <div class="col-md-8 ">
            <div class="card bg-purple-200">
                <div class="card-header text-center">{{ __('ASIGNAR TICKET') }}</div>

                <div class="card-body  ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                      
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Ticket') }}</label>

                            <div class="col-md-6">
                                <input id="id_ticket" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

<!--                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_departamento" class="col-md-4 col-form-label text-md-end">{{ __('Departamento') }}</label>

                            <div class="col-md-6">

                            <select name="id_departamento" id="">
                            <option selected >Seleccione Departamento</option>    
                            <option value="1">Compras</option>    
                            <option value="2">Contabilidad</option>    
                            <option value="3">Logística</option>    
                            <option value="4">Producción</option>    
                            <option value="5">Ventas</option>    
                            </select>
                            
                            </div>
                        </div>
                        <div class="col-mb-3 content-center ">

                        <label for="id_descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>
                            <div class="row mb-3">
                                <textarea name="descripcion" id="" class="pl-5 " cols="10"  rows="3"></textarea>
                             
                            </div>
                        </div>


                        

                        <div class="row mb-0">
                            <div class=" text-center">
                                <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                    {{ __('Asignar') }}
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
