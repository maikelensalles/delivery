<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{ 
    protected $table = 'categorias';

    public $timestamps = false; 

    protected $fillable = ['nome', 'descricao', 'imagem', 'nome_url', 'produtos'];

}
