<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        "cantidad",
        "subtotal",
        "sale_id",
        "producto_id",
        "precio",
    ];
}
