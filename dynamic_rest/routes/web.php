<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/crear-producto', [App\Http\Controllers\ProductosController::class, 'createProducto']);
Route::get('/editar-producto', [App\Http\Controllers\ProductosController::class, 'update']);
Route::post('/storeProducto/store', [App\Http\Controllers\ProductosController::class, 'storeProducto']);
Route::get('/editaProducto/{id}/edit',[App\Http\Controllers\ProductosController::class,'editaProducto']);

