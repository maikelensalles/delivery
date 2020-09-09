<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    protected $request; 
    private $repository;

    public function __construct(Request $request, Produto $produto)
    {
        $this->request = $request;
        $this->repository = $produto;

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
        $produtos = Produto::first()->paginate();

        return view('admin.pages.products.index', [
            'produtos' => $produtos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('nome', 'descricao', 'descricao_longa', 'categoria', 'valor', 'nome_url', 'image');
 
        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('produtos');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();
        if (!$produto = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.show', [
            'produto' => $produto
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
        if (!$produto = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        if (!$produto = $this->repository->find($id))
            return redirect()->back(); 

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) { 
            
            if ($produto->image && Storage::exists($produto->image)) {
                Storage::delete($produto->image);
            }

            $imagePath = $request->image->store('produtos');
            $data['image'] = $imagePath;
        
        }
        
        $produto->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->repository->where('id', $id)->first();
        if (!$produto)
            return redirect()->back();

        if ($produto->image && Storage::exists($produto->image)) {
            Storage::delete($produto->image);
        }

        $produto->delete();

        return redirect()->route('products.index');
    } 

    /**
     * Search Products
     */
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $produtos = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'produtos' => $produtos,
            'filters' => $filters,
        ]);
    }
}
