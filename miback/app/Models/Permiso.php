<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'nombre',
        'padre_id'
    ];

    public function permisos(){
        return $this->hasMany(Permiso::class)->with('permisos');
    }
}
