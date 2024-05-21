<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Pais extends Model
{
    use QueryCacheable;
    protected static $flushCacheOnUpdate = true;
    public $cacheFor = 3600; // cache time, in seconds
    
    public $timestamps = false;
    protected $table = 'paises';

    public $fillable = [
        "id",
        "nome",
        "sigla",
        "ISO2",
        "ISO3",
        "ISON",
        "ativo"
    ];

    public function estados() {
        return $this->hasMany('App\Models\Common\Estado','pais_id');

    }
}
