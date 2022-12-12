<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;
use App\Http\Request\VentasRequest;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Venta::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentasRequest $request)
    {
        $venta = new Venta();
        $venta->id = $request->id;
        $venta->id_usuario = $request->id_usuario;
        $venta->id_cliente = $request->id_cliente;
        $venta->fecha = $request->fecha;
        $venta->total = $request->total;
        $venta->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(venta $venta)
    {
        return $venta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venta $venta)
    {
        $venta->id = $request->id;
        $venta->id_usuario = $request->id_usuario;
        $venta->id_cliente = $request->id_cliente;
        $venta->fecha = $request->fecha;
        $venta->total = $request->total;
        $venta->save();
        return $venta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(venta $venta)
    {
        $venta->delete();
    }
}
