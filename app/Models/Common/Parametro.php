<?php

namespace App\Models\Common;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Parametro extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'valor',
        'descricao',
        'padrao',
    ];

    public static function parametro(String $nome, $default = null) {
        $p = Parametro::where('nome', $nome)->first();        
        if($p == null)
            return $default;
        
        return $p->valor;
        
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logAll()
        ->logOnlyDirty()
        ->logExcept([
            ''
        ])
        ->dontSubmitEmptyLogs();

    }

}
