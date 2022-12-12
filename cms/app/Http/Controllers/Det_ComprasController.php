<?php

namespace App\Http\Controllers;

use App\Models\det_compra;
use Illuminate\Http\Request;

class Det_ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Det_Compra::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $det_compra = new Det_Compra();
        $det_compra->compra_id = $request->compra_id;
        $det_compra->producto_id = $request->producto_id;
        $det_compra->cantidad = $request->cantidad;
        $det_compra->precio_unitario = $request->precio_unitario;
        $det_compra->sub_total = $request->sub_total;
        $det_compra->medio_pago = $request->medio_pago;
        $det_compra->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\det_compra  $det_compra
     * @return \Illuminate\Http\Response
     */
    public function show(det_compra $det_compra)
    {
        return $det_compra;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\det_compra  $det_compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, det_compra $det_compra)
    {
        $det_compra->compra_id = $request->compra_id;
        $det_compra->producto_id = $request->producto_id;
        $det_compra->cantidad = $request->cantidad;
        $det_compra->precio_unitario = $request->precio_unitario;
        $det_compra->sub_total = $request->sub_total;
        $det_compra->medio_pago = $request->medio_pago;
        $det_compra->save();
        return $det_compra;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\det_compra  $det_compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(det_compra $det_compra)
    {
        $det_compra->delete();
    }
}
