<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    public $timestamps = false;

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

