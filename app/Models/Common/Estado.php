<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $fillable = [
        "id",
        "nome",
        "sigla",
        "pais_id"
    ];

    public function pais() {

        return $this->belongsTo('App\Models\Common\Pais', 'pais_id');
    }

    public function cidades() {
        return $this->hasMany('App\Models\Common\Cidade','estado_id');
    }
}
