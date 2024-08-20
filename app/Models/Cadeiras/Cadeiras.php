<?php

namespace App\Models\Cadeiras;

use App\Models\Assinaturas\Unidades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cadeiras extends Model
{
    use SoftDeletes;
    protected $table = 'cadeiras';

    protected $fillable = [
        "nome",
        "horario_disponivel_inicial",
        "horario_disponivel_fim",
        "ativa",
        "unidade_id",
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function unidade(){
        return $this->belongsTo(Unidades::class, "unidade_id");
    }

    public function reservas(){
        return $this->hasMany(CadeirasReservas::class, "cadeira_id");
    }
}
