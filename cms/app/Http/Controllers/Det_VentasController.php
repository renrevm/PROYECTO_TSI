<?php

namespace App\Http\Controllers;

use App\Models\Det_Venta;
use Illuminate\Http\Request;

class Det_VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Det_Venta::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $det_venta = new Det_Venta();
        $det_venta->venta_id = $request->venta_id;
        $det_venta->producto_id = $request->producto_id;
        $det_venta->cantidad = $request->cantidad;
        $det_venta->precio_unitario = $request->precio_unitario;
        $det_venta->sub_total = $request->sub_total;
        $det_venta->total = $request->total;
        $det_venta->medio_pago = $request->medio_pago;
        $det_venta->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Det_Venta  $Det_Venta
     * @return \Illuminate\Http\Response
     */
    public function show(Det_Venta $Det_Venta)
    {
        return $det_venta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Det_Venta  $Det_Venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Det_Venta $Det_Venta)
    {
        $det_venta->venta_id = $request->venta_id;
        $det_venta->producto_id = $request->producto_id;
        $det_venta->cantidad = $request->cantidad;
        $det_venta->precio_unitario = $request->precio_unitario;
        $det_venta->sub_total = $request->sub_total;
        $det_venta->total = $request->total;
        $det_venta->medio_pago = $request->medio_pago;
        $det_venta->save();
        return $det_venta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Det_Venta  $Det_Venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Det_Venta $Det_Venta)
    {
        $det_venta->delete();
    }
}
