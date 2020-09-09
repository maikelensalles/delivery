<?php

namespace App\Http\Controllers; 

use App\Http\Requests\StoreUpdateCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function __construct(Request $request, Categoria $categoria)
    {
        $this->request = $request;
        $this->repository = $categoria;

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
        $categorias = Categoria::first()->paginate();

        return view('admin.pages.categorias.index', [
            'categorias' => $categorias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoriaRequest $request)
    {
        $data = $request->only('nome', 'descricao', 'nome_url', 'produtos', 'imagem');

        if ($request->hasFile('imagem') && $request->imagem->isValid()) {
            $imagemPath = $request->imagem->store('categorias');

            $data['imagem'] = $imagemPath;
        }

        $this->repository->create($data);

        return redirect()->route('categorias.index');
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
        if (!$categoria = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.categorias.show', [
            'categoria' => $categoria
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
        if (!$categoria = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoriaRequest $request, $id)
    {
        if (!$categoria = $this->repository->find($id))
            return redirect()->back(); 

        $data = $request->all();

        if ($request->hasFile('imagem') && $request->imagem->isValid()) { 
            
            if ($categoria->imagem && Storage::exists($categoria->imagem)) {
                Storage::delete($categoria->imagem);
            }

            $imagemPath = $request->imagem->store('categorias');
            $data['imagem'] = $imagemPath;
        
        }
        
        $categoria->update($data);

        return redirect()->route('admin.pages.categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = $this->repository->where('id', $id)->first();
        if (!$categoria)
            return redirect()->back();

        if ($categoria->imagem && Storage::exists($categoria->imagem)) {
            Storage::delete($categoria->imagem);
        }

        $categoria->delete();

        return redirect()->route('admin.pages.categorias.index');
    }

}
