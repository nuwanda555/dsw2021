<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class PedidoController extends Controller
{
    public function listado($clienteId){
        return Cliente::find($clienteId)->pedidos;
    }
}
