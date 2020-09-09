<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'carrinho'; 

    public $timestamps = false; 

    protected $fillable = ['id_venda', 'id_produto', 'cpf', 'quantidade'];

}
