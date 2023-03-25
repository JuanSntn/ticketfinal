<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EditUser;
/* use App\Models\User; */
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class EditUserController extends Controller
{

public function __construct()
{
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=> ['index']]);
}


public function viewEditUser(){
    return view('editaruser');
}


public function update(Request $request)
{
    $user = Auth::user();
    $user->name = $request->input('name');
    $user->telefono = $request->input('telefono');
    $user->direccion = $request->input('direccion');
    $user->save();

    return redirect('perfiluser')->with('success', 'User updated successfully!');
}

public function edit()
    {
        $user = Auth::user();

        return view('editaruser', compact('user'));
    }


}
