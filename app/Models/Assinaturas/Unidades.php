<?php

namespace App\Models\Assinaturas;

use App\Models\Cadeiras\Cadeiras;
use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    protected $table = "unidades";

    protected $fillable = [
        "nome",
        "cidade",
        "sigla",
        "endereco_completo"
    ];

    public function cadeiras()
    {
        return $this->hasMany(Cadeiras::class, "unidade_id");
    }
}
