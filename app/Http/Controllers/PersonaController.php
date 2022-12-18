<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //traemos todos los registros y lo asignamos a la variable "persona"
        $personas = Persona::all();
        return $personas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
        //se crea una instancia de la clase Persona
        $personas = new Persona();
        //capturamos con el objeto request lo guardamos en la tabla persona y su respectivo campo
        $personas->nombre = $request->nombre;
        $personas->apellido = $request->apellido;
        $personas->edad = $request->edad;
        $personas->telefono = $request->telefono;

        $personas->save();

        return response()->json(['message'=>'Registro creado con exito.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $persona = Persona::findOrFail($request->id);
        return $persona;

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
    public function update(Request $request)
    {
        //como parametro se captura el id, utilizando el objeto request
        $personas = Persona::findOrFail($request->id);
        $personas->nombre = $request->nombre;
        $personas->apellido = $request->apellido;
        $personas->edad = $request->edad;
        $personas->telefono = $request->telefono;

        $personas->save();

        return $personas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personas = Persona::find($id);
        if (is_null($personas)) {
            return response()->json(['message'=>'Registro no encontrado.']);
        }

        $personas->delete();
        return response()->json(['message'=>'Registro eliminado con exito.']);
    }
}
