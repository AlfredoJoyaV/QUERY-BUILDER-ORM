<?php

use App\Http\Controllers\ConsultaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/consulta1', [ConsultaController::class, 'insertarRegistros']);
Route::get('/consulta2', [ConsultaController::class, 'pedidosUsuario2']);
Route::get('/consulta3', [ConsultaController::class, 'detallesPedidos']);
Route::get('/consulta4', [ConsultaController::class, 'pedidosRango']);
Route::get('/consulta5', [ConsultaController::class, 'usuariosLetraR']);
Route::get('/consulta6', [ConsultaController::class, 'totalPedidosUsuario5']);
Route::get('/consulta7', [ConsultaController::class, 'pedidosOrdenadosPorTotal']);
Route::get('/consulta8', [ConsultaController::class, 'sumaTotalPedidos']);
Route::get('/consulta9', [ConsultaController::class, 'pedidoMasEconomico']);
Route::get('/consulta10', [ConsultaController::class, 'pedidosAgrupadosPorUsuario']);
Route::get('/consulta11', [ConsultaController::class, 'usuariosConPedidos']);