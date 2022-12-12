<?php

namespace App\Http\Controllers;

use App\Models\compra;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Compra::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = new Compra();
        $compra->id = $request->id;
        $compra->id_usuario = $request->id_usuario;
        $compra->id_proveedor = $request->id_proveedor;
        $compra->fecha = $request->fecha;
        $compra->total = $request->total;
        $compra->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(compra $compra)
    {
        return $compra;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compra $compra)
    {
        $compra->id = $request->id;
        $compra->id_usuario = $request->id_usuario;
        $compra->id_proveedor = $request->id_proveedor;
        $compra->fecha = $request->fecha;
        $compra->total = $request->total;
        $compra->save();
        return $compra;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(compra $compra)
    {
        $compra->delete();
    }
}
