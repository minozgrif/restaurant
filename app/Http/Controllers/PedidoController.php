<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:gestionar_pedidos');
    }

    public function index()
    {
        return Pedido::all();
    }
}
