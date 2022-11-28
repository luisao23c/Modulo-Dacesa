<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_herramientas extends Model
{
    use HasFactory;
    protected $table ="user_herramientas"; 

    protected $fillable = [
        'user',
        'herramienta',
        'cantidad',
       
    ];
}
