<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;


class CarController extends Controller
{
    protected $request; 
    private $repository;

    public function __construct(Request $request, Car $car)
    {
        $this->request = $request;
        $this->repository = $car;

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
        $carrinho = Car::first()->paginate();

        return view('admin.pages.carrinho.index', [
            'carrinho' => $carrinho,
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
        $carrinho = Car::withCount('comments')->get();

        foreach ($carrinho as $car) {
            echo $car->comments_count;
        }
        

        
        return view('layouts.headers.cards', [
            'car' => $car,
        ]);
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
}
