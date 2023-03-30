<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tickets;
use App\Models\Usuarios;
use App\Models\Departamentos;
use Illuminate\Support\Facades\Hash;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=> ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        $users = tickets::all();


        return view('home', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
        ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->tipo = $request->input('tipo');
            $user->password = Hash::make($request->input('password'));
            $user->telefono = $request->input('telefono');
            $user->direccion = $request->input('direccion');
            $user->save();

        return redirect('/create')->with('status', 'Los datos se guardaron correctamente.');

    }

    public function departamento(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required'

        ]);

        $name = new departamentos();
        $name->nombre = $request->input('nombre');
        $name->save();

        return redirect('/home/departamento/')->with('status', 'Los datos se guardaron correctamente.');
    }



    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = tickets::findOrFail($id);
        $departamentos = departamentos::all();

        return view('ticket', compact('user','departamentos'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'cargo' => 'required',
            'descripcion' => 'required',
        ]);

        $user = tickets::findOrFail($id);

        $user->cargo = $request->cargo;
        $user->descripcion = $request->descripcion;
        $user->save();

        return redirect('/home')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {

        $user = tickets::findOrFail($id);

        $user->delete();

        return redirect()->route('home')->with('mensaje', 'Usuario eliminado correctamente.');

    }



}
