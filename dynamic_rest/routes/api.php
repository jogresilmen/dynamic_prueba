<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("registro-cliente",[ApiController::class, 'registerClientes']);
Route::post("login-clientes",[ApiController::class, 'loginclientes']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post("perfil-clientes",[ApiController::class, 'perfilCliente']);
    Route::post("logout-clientes",[ApiController::class, 'logoutCliente']);
    Route::get("product-all",[ApiController::class, 'getAllProducts']);
    // Route::get("product-all",[ApiController::class, 'getAllProducts']);
});

    
