<?php

namespace App\Http\Controllers;

use App\Models\detventa;
use Illuminate\Http\Request;

class DetVentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DetVenta::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $det_venta = new DetVenta();
        $det_venta->id = $request->id;
        $det_venta->id_producto = $request->id_producto;
        $det_venta->cantidad = $request->cantidad;
        $det_venta->precio = $request->precio;
        $det_venta->sub_total = $request->sub_total;
        $det_venta->medio_pago = $request->medio_pago;
        $det_venta->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detventa  $detventa
     * @return \Illuminate\Http\Response
     */
    public function show(detventa $detventa)
    {
        return $det_venta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detventa  $detventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detventa $detventa)
    {
        $det_venta->id = $request->id;
        $det_venta->id_producto = $request->id_producto;
        $det_venta->cantidad = $request->cantidad;
        $det_venta->precio = $request->precio;
        $det_venta->sub_total = $request->sub_total;
        $det_venta->medio_pago = $request->medio_pago;
        $det_venta->save();
        return $det_venta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detventa  $detventa
     * @return \Illuminate\Http\Response
     */
    public function destroy(detventa $detventa)
    {
        $det_venta->delete();
    }
}
