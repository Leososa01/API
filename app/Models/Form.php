<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//tablas en la base de datos
class Form extends Model
{
    use HasFactory;
    protected $table = 'forms';
    public $fillable =['nombre', 'email', 'edad', 'contrasena', 'contrasena_confirmation'];
}  