<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\tickets;
use App\Models\Departamentos;
use Illuminate\Http\Middleware\SoloModerador;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solouser',['only'=> ['index']]);
    }

    public function index()
    {
        $users = tickets::all();
        $departamentos = departamentos::all();


        return view('user', compact('users','departamentos'));
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'id_departamentos' => 'required',
            'descripcion' => 'required',
            'autor'=> 'requiered',


        ]);

            $users = new Tickets();
            $users->descripcion = $request->input('descripcion');
            $users->autor = auth()->user()->name;
            $users->id_departamentos = $request->input('id_departamentos');
            $users->user()->associate(auth()->user());


            $users->save();

            return redirect('/users')->with('status', 'Los datos se guardaron correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tickets = tickets::all();



        return view('user', compact('tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
