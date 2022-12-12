<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Request\ProductosRequest;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Producto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosRequest $request)
    {
        //dd($request->cod_producto);
        $producto = new Producto();
        $producto->id = $request->id;
        $producto->id_categoria = $request->id_categoria;
        $producto->id_ajuste = $request->id_ajuste;
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio_costo = $request->precio_costo;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = $request->stock;
        $producto->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->id = $request->id;
        $producto->id_categoria = $request->id_categoria;
        $producto->id_ajuste = $request->id_ajuste;
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio_costo = $request->precio_costo;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = $request->stock;
        $producto->save();
        return $producto;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
    }
}
