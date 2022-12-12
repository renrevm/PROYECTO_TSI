<?php

namespace App\Http\Controllers;

use App\Models\ajuste_stock;
use Illuminate\Http\Request;
use App\Http\Request\Ajustes_StockRequest;

class Ajustes_StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ajuste_Stock::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Ajustes_StockRequest $request)
    {
        $ajuste_stock = new Ajuste_Stock();
        $ajuste_stock->id = $request->id;
        $ajuste_stock->fecha = $request->fecha;
        $ajuste_stock->tipo_ajuste = $request->tipo_ajuste;
        $ajuste_stock->motivo = $request->motivo;
        $ajuste_stock->cantidad = $request->cantidad;
        $ajuste_stock->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ajuste_stock  $ajuste_stock
     * @return \Illuminate\Http\Response
     */
    public function show(ajuste_stock $ajuste_stock)
    {
        return $ajuste_stock;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ajuste_stock  $ajuste_stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ajuste_stock $ajuste_stock)
    {
        $ajuste_stock->id = $request->id;
        $ajuste_stock->fecha = $request->fecha;
        $ajuste_stock->tipo_ajuste = $request->tipo_ajuste;
        $ajuste_stock->motivo = $request->motivo;
        $ajuste_stock->cantidad = $request->cantidad;
        $ajuste_stock->save();
        return $ajuste_stock;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ajuste_stock  $ajuste_stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(ajuste_stock $ajuste_stock)
    {
        $ajuste_stock->delete();
    }
}
