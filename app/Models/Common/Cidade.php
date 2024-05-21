<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public $fillable = [
        "nome",
        "ibge",
        "estado_id"
    ];

    public function estado(){
        return $this->belongsTo('App\Models\Comum\Estado');
    }
}
