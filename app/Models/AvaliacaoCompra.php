<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoCompra extends Model
{
    use HasFactory;
    protected $table = 'avaliacao_compra';
    public $timestamps = false;
}
