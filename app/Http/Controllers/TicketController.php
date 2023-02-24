<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $tickets = Ticket::all();
        return view('ticket');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return view('tickets.asignar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validateData=$request->validate([
        
            'autor'=>'required',
            'fecha'=>'required',
            'clasif'=>'required',
            'detalles'=>'required',
            'estatus'=>'required',
            'id_departamento'=>'required',

        ]);

        

        $ticket= new Ticket();
       
        $ticket->autor=$request->input('autor');
        $ticket->fecha=$request->input('fecha');
        $ticket->clasif=$request->input('clasif');
        $ticket->detalles=$request->input('detalles');
        $ticket->estatus=$request->input('estatus');
        $ticket->id_departamento=$request->input('id_departamento');
        $ticket->save();

        return redirect ('/ticket')->with('status', 'Los datos se guardaron correctamente.')




        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $ticket=Ticket::findOrFail($id);
        return view('ticket.show',compact('ticket'))
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $ticket=Ticket::findOrFail($id);
        return view('ticket.edit',compact('ticket'))
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate([
            
            'autor'=>'required',
            'fecha'=>'required',
            'clasif'=>'required',
            'detalles'=>'required',
            'estatus'=>'required',
            'id_departamento'=>'required',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($validatedData);

        return redirect('/ticket')->with('status', 'ticket añadido correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
