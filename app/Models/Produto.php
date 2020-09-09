<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos'; 

    public $timestamps = false;  

    protected $fillable = ['nome', 'valor', 'descricao','descricao_longa', 'categoria', 'image', 'nome_url'];

    public function search($filter = null) 
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('nome', 'LIKE', "%{$filter}%");
            }
        })//->toSql();
        ->paginate();

        return $results;
    }
}
