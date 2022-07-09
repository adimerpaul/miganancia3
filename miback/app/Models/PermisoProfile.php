<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoProfile extends Model
{
    use HasFactory;
    protected $fillable=[
        'profile_id',
        'permiso_id',
        'estado'
    ];
}
