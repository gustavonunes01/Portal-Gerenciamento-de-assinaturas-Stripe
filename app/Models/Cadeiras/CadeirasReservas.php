<?php

namespace App\Models\Cadeiras;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CadeirasReservas extends Model
{
    use SoftDeletes;
    protected $table = 'cadeiras_reservadas';

    protected $fillable = [
        "cadeira_id",
        "user_id",
        "hora_reserva_inicial",
        "hora_reserva_fim",
    ];

    protected $dates = [
        "hora_reserva_inicial",
        "hora_reserva_fim",
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function cadeira(){
        return $this->belongsTo(Cadeiras::class, 'cadeira_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
