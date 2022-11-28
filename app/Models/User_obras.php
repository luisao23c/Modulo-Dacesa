<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_obras extends Model
{
    use HasFactory;
    protected $table ="user_obras"; 

    protected $fillable = [
        'user',
        'obra',
       
    ];
}
