<?php

namespace App\Http\Controllers;

use App\Models\Arqueo_Caja;
use Illuminate\Http\Request;
use App\Http\Request\Arqueos_CajaRequest;

class Arqueos_CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Arqueo_Caja::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Arqueos_CajaRequest $request)
    {
        $Arqueo_Caja = new Arqueo_Caja();
        $Arqueo_Caja->id = $request->id;

        $Arqueo_Caja->fecha = $request->fecha;
        $Arqueo_Caja->inicio = $request->inicio;
        $Arqueo_Caja->termino = $request->termino;
        $Arqueo_Caja->inicio_caja = $request->inicio_caja;
        $Arqueo_Caja->cierre_caja = $request->cierre_caja;
        $Arqueo_Caja->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arqueo_Caja  $Arqueo_Caja
     * @return \Illuminate\Http\Response
     */
    public function show(Arqueo_Caja $Arqueo_Caja)
    {
        return $Arqueo_Caja;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arqueo_Caja  $Arqueo_Caja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arqueo_Caja $Arqueo_Caja)
    {
        $Arqueo_Caja->id = $request->id;
        $Arqueo_Caja->fecha = $request->fecha;
        $Arqueo_Caja->inicio = $request->inicio;
        $Arqueo_Caja->termino = $request->termino;
        $Arqueo_Caja->inicio_caja = $request->inicio_caja;
        $Arqueo_Caja->cierre_caja = $request->cierre_caja;
        $Arqueo_Caja->save();
        return $Arqueo_Caja;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arqueo_Caja  $Arqueo_Caja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arqueo_Caja $Arqueo_Caja)
    {
        $Arqueo_Caja->delete();
    }
}
