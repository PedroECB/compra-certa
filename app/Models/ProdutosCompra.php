<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosCompra extends Model
{
    use HasFactory;
    protected $table = 'produtos_compra';
    public $timestamps = false;
}
