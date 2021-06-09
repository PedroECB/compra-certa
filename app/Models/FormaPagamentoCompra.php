<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamentoCompra extends Model
{
    use HasFactory;
    protected $table = 'forma_pagamento_compra';
    public $timestamps = false;
}
