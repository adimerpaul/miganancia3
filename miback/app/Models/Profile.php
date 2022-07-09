<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'negocio_id'
    ];

    public function permisos(){
        return $this->belongsToMany(Permiso::class)->withPivot('permiso_id','estado'); ;
    }
}
