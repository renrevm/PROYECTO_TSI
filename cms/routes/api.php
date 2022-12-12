<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Det_ComprasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\Arqueos_CajaController;
use App\Http\Controllers\Ajustes_StockController;
use App\Http\Controllers\Det_VentasController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ClientesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/productos', ProductosController::class);
Route::apiResource('/categorias', CategoriasController::class);
Route::apiResource('/det_compras', Det_ComprasController::class);
Route::apiResource('/compras', ComprasController::class);
Route::apiResource('/proveedores', ProveedoresController::class);
Route::apiResource('/registros', RegistrosController::class);
Route::apiResource('/arqueos_caja', Arqueos_CajaController::class);
Route::apiResource('/ajustes_stock', Ajustes_StockController::class);
Route::apiResource('/det_ventas', Det_VentasController::class);
Route::apiResource('/ventas', VentasController::class);
Route::apiResource('/clientes', ClientesController::class);