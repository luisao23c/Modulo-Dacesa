<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{
    use HasFactory;
    protected $table ="Vale"; 

    protected $fillable = [
        'numero_vale',
        'user_herramientas',
       
    ];
}
