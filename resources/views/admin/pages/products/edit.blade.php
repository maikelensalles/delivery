@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="p-4 bg-secondary">
                            <h1>Editar Produto</h1>
                                <form method="post" action="{{ route('products.update', $produto) }}"  enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    @method('put')
        
                                    <div class="pl-lg-4">
                                        
                                        <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
                                            <input type="text" name="nome" id="input-nome" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('nome', $produto->nome) }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'nome'])
                                        </div>
                                        <div class="form-group{{ $errors->has('produto_categoria_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">Categoria</label>
                                            <select name="produto_categoria_id" id="input-categoria" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                                @foreach ($categorias as $categoria)
                                                    @if($categoria['id'] == old('document') or $categoria['id'] == $produto->produto_categoria_id)
                                                        <option value="{{$categoria['id']}}" selected>{{$categoria['name']}}</option>
                                                    @else
                                                        <option value="{{$categoria['id']}}">{{$categoria['name']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'produto_categoria_id'])
                                        </div>
        
                                        <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao">Descricao</label>
                                            <input type="text" name="descricao" id="input-descricao" class="form-control form-control-alternative" placeholder="Descricao" value="{{ old('descricao', $produto->descricao) }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao'])
        
                                        </div>

                                        <div class="form-group{{ $errors->has('descricao_longa') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-descricao_longa">Descrição Longa</label>
                                            <input type="text" name="descricao_longa" id="input-descricao_longa" class="form-control form-control-alternative" placeholder="Descricao Longa" value="{{ old('descricao_longa', $produto->descricao_longa) }}" required>
                                            @include('alerts.feedback', ['field' => 'descricao_longa'])
                                        </div>

                                        <div class="row">
                                            <div class="col-6">                                    
                                                <div class="form-group{{ $errors->has('estoque') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-estoque">Estoque</label>
                                                    <input type="number" name="estoque" id="input-estoque" class="form-control form-control-alternative" placeholder="Estoque" value="{{ old('estoque', $produto->estoque) }}" required>
                                                    @include('alerts.feedback', ['field' => 'estoque'])
                                                </div>
                                            </div>                            
                                            
                                            <div class="col-6">                                    
                                                <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-valor">Valor</label>
                                                    <input type="number" step=".01" name="valor" id="input-valor" class="form-control form-control-alternative" placeholder="Valor" value="{{ old('valor', $produto->valor) }}" required>
                                                    @include('alerts.feedback', ['field' => 'valor'])
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control form-control-alternative" >
                                            @include('alerts.feedback', ['field' => 'image'])
                                        </div>
        
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush