<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Car;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Venda $venda)
    {
        $this->request = $request;
        $this->repository = $venda;

        //$this->middleware('auth');
        /*$this->middleware('auth')->only([
            'create', 'store'
        ]);*/
        /*$this->middleware('auth')->except([
            'index', 'show'
        ]);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrinhos = Car::first();
        $vendas = Venda::all();

        return view('admin.pages.vendas.index', [
            'vendas' => $vendas,
            'carrinho' => $carrinhos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $vendas = $this->repository->search($request->filter);

        return view('admin.pages.vendas.index', [
            'vendas' => $vendas,
            'filters' => $filters,
        ]);
    }

}
