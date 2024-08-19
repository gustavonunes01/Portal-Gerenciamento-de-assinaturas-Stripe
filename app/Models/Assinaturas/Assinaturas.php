<?php

namespace App\Models\Assinaturas;

use Illuminate\Database\Eloquent\Model;

class Assinaturas extends Model
{
    protected $table = "assinaturas";

    protected $fillable = [
        "passaporte_id",
        "subscription_id",
        "plan_id",
        "unidade_id",
        "status",
        "valor",
    ];

    public function unidade(){
        return $this->belongsTo(Unidades::class, 'unidade_id');
    }

    public function passaporte(){
        return $this->belongsTo(PassaporteUsuario::class, 'passaporte_id');
    }
}
