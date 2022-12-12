<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use App\Http\Request\RegistrosRequest;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Registro::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrosRequest $request)
    {
        $Registro = new Registro();
        $Registro->id = $request->id;
        $Registro->rol = $request->rol;
        $Registro->nombre = $request->nombre;
        $Registro->contraseña = $request->contraseña;
        $Registro->email = $request->email;
        $Registro->id_arqueo = $request->id_arqueo;
        $Registro->save();
        return $Registro;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $Registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $Registro)
    {
        return $Registro;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $Registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $Registro)
    {
        $Registro->id = $request->id;
        $Registro->rol = $request->rol;
        $Registro->nombre = $request->nombre;
        $Registro->contraseña = $request->contraseña;
        $Registro->email = $request->email;
        $Registro->id_arqueo = $request->id_arqueo;
        $Registro->save();
        return $Registro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $Registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $Registro)
    {
        $Registro->delete();
    }
}
