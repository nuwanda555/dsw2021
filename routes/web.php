<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
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


Route::get('/hola', function() {
    return '<h1>hola</h1>';
});



Route::get("centros/qr/{centro}",[CentroController::class, 'qr'])->name("centros.qr");
Route::get("centros/pdf",[CentroController::class, 'listadoPdf'])->name("centros.pdf");
Route::resource('centros', 'App\Http\Controllers\CentroController')->middleware("auth");


Route::get("pedidos/listado/{cliente_id}",[PedidoController::class, 'listado']);
Route::resource('clientes', 'App\Http\Controllers\ClienteController')->middleware("auth");



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
