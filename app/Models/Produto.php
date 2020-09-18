<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos'; 

    public $timestamps = false;  

    protected $fillable = ['nome', 'valor', 'descricao','descricao_longa', 'categoria', 'image'];

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

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'categoria', 'id');
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

    public function carrinho()
    {
        return $this->hasMany(Car::class);
    }
    
}
