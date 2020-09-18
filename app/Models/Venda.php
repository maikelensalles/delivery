<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    public $timestamps = false;

    protected $fillable = ['nome_cliente', 'total', 'total_pago', 'troco', 'tipo_pgto', 'data', 'hora', 'status', 'pago', 'obs'];

    public function carrinho()
    {
        return $this->belongsTo(Car::class, 'id_produto', 'id');
    }

    public function produtos()
    {
        return $this->belongsTo(Produto::class);
    }
}

