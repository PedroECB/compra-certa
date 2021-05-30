<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoUsuario extends Model
{
    use HasFactory;
    protected $table = 'endereco_usuario';
    public $timestamps = false;

}
