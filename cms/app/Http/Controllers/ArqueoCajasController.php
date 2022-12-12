<?php

namespace App\Http\Controllers;

use App\Models\arqueocaja;
use Illuminate\Http\Request;

class ArqueoCajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArqueoCaja::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arqueocaja = new ArqueoCaja();
        $arqueocaja->id = $request->id;
        $arqueocaja->id_usuario = $request->id_usuario;
        $arqueocaja->fecha = $request->fecha;
        $arqueocaja->hora_inicio = $request->hora_inicio;
        $arqueocaja->hora_termino = $request->hora_termino;
        $arqueocaja->monto_inicial = $request->monto_inicial;
        $arqueocaja->monto_final = $request->monto_final;
        $arqueocaja->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\arqueocaja  $arqueocaja
     * @return \Illuminate\Http\Response
     */
    public function show(arqueocaja $arqueocaja)
    {
        return $arqueocaja;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\arqueocaja  $arqueocaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, arqueocaja $arqueocaja)
    {
        $arqueocaja->id = $request->id;
        $arqueocaja->id_usuario = $request->id_usuario;
        $arqueocaja->fecha = $request->fecha;
        $arqueocaja->hora_inicio = $request->hora_inicio;
        $arqueocaja->hora_termino = $request->hora_termino;
        $arqueocaja->monto_inicial = $request->monto_inicial;
        $arqueocaja->monto_final = $request->monto_final;
        $arqueocaja->save();
        return $arqueocaja;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\arqueocaja  $arqueocaja
     * @return \Illuminate\Http\Response
     */
    public function destroy(arqueocaja $arqueocaja)
    {
        $arqueocaja->delete();
    }
}
