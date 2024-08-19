<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'link',
        'icone',
        'badge',
        'badge_texto'
    ];

    public function menu(){
        return $this->belongsTo('App\Models\Common\Menu','menu_id');
    }

    public function submenus(){
        return $this->hasMany('App\Models\Common\Menu','menu_id');
    }

    public function permissoes(){
        return $this->belongsToMany(config('permission.models.permission'),'menu_permission','menu_id','permission_id');
    }

}
