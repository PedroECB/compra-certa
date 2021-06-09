<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parecer extends Model
{
    use HasFactory;
    protected $table = 'parecer';
    public $timestamps = false;
}
