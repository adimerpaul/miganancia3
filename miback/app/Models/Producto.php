<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        "nombre",
        "codigo",
        "cantidad",
        "costo",
        "ganancia",
        "precio",
        "foto",
        "descripcion",
        "visible",
        "categoria_id",
        "negocio_id",
    ];
}
