<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Usuarios;
use App\Models\departamentos;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('soloadmin',['only'=> ['index']]);
     }

    public function index()
    {
        $departamentos = departamentos::all();


        return view('cruddepartamento', compact('departamentos'));
    }



    public function asignar(Request $request)
    {
        $departamentos = departamentos::all();

        return view('editar.ticket', compact('departamentos'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $departamentos = departamentos::findOrFail($id);

        $departamentos->delete();

        return redirect()->route('home')->with('mensaje', 'Usuario eliminado correctamente.');
    }
}
