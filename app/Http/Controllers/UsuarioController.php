<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\tickets;
use App\Models\Usuarios;
use App\Models\Departamentos;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=> ['index']]);
    }

    public function index()
    {
        $users = User::all();


        return view('crearuser', compact('users'));
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('crearuser');

    }
}
