@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h1>Editar Categoria {{ $categoria->nome }}</h1>
                            <form action="{{ route('categorias.update', $categoria->id) }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @include('admin.pages.categorias.reuses.form')   
                            </form> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection