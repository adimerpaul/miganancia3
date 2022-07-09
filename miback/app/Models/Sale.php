<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        "fecha",
        "hora",
        "concepto",
        "medio",
        "valor",
        "cliente_id",
        "provider_id",
        "user_id",
        "tipo",
        "negocio_id",
        "num",
    ];
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function details(){
        return $this->hasMany(Detail::class);
    }
}
