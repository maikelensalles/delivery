<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $carrinho = Car::first();

        $cliente = Cliente::first();

        $vendas = Venda::first()->paginate();

        $produtos = Produto::first();

        
        return view('dashboard', [
            'carrinho' => $carrinho, 'cliente'=> $cliente, 'vendas' => $vendas, 'produtos' => $produtos,
        ]);
        
    }
}
