<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class herramientas extends Model
{
    use HasFactory;
    protected $table = 'herramientas';

    protected $fillable = [
        'nombre',
        'numero_serie',
        'estado',
    ];
}
