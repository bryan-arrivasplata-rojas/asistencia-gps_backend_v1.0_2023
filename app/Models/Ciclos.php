<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclos extends Model
{
    use HasFactory;
    protected $ciclos = [
        'cod_tipo_ciclo','semanas'
    ];
}
