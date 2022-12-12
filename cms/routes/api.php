<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DetComprasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ArqueoCajasController;
use App\Http\Controllers\AjusteStocksController;
use App\Http\Controllers\DetVentasController;
use App\Http\Controllers\VentasController;

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
Route::apiResource('/det_compras', DetComprasController::class);
Route::apiResource('/compras', ComprasController::class);
Route::apiResource('/proveedor', ProveedoresController::class);
Route::apiResource('/usuarios', UsuariosController::class);
Route::apiResource('/arqueocaja', ArqueoCajasController::class);
Route::apiResource('/ajustestock', AjusteStocksController::class);
Route::apiResource('/det_venta', DetVentasController::class);
Route::apiResource('/venta', VentasController::class);