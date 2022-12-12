<?php

namespace App\Http\Controllers;

use App\Models\ajustestock;
use Illuminate\Http\Request;

class AjusteStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AjusteStock::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ajustestock = new AjusteStock();
        $ajustestock->id = $request->id;
        $ajustestock->id_producto = $request->id_producto;
        $ajustestock->fecha = $request->fecha;
        $ajustestock->tipo_ajuste = $request->tipo_ajuste;
        $ajustestock->motivo = $request->motivo;
        $ajustestock->cantidad = $request->cantidad;
        $ajustestock->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ajustestock  $ajustestock
     * @return \Illuminate\Http\Response
     */
    public function show(ajustestock $ajustestock)
    {
        return $ajustestock;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ajustestock  $ajustestock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ajustestock $ajustestock)
    {
        $ajustestock->id = $request->id;
        $ajustestock->id_producto = $request->id_producto;
        $ajustestock->fecha = $request->fecha;
        $ajustestock->tipo_ajuste = $request->tipo_ajuste;
        $ajustestock->motivo = $request->motivo;
        $ajustestock->cantidad = $request->cantidad;
        $ajustestock->save();
        return $ajustestock;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ajustestock  $ajustestock
     * @return \Illuminate\Http\Response
     */
    public function destroy(ajustestock $ajustestock)
    {
        $ajustestock->delete();
    }
}
