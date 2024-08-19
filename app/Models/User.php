<?php

namespace App\Models;


use App\Models\Assinaturas\PassaporteUsuario;
use App\Models\Cadeiras\CadeirasReservas;
use App\Models\Traits\UuidTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Common\Menu;


class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable, UuidTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'url_foto',
        'tipo_user',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function passaporte(){
        return $this->hasOne(PassaporteUsuario::class, 'user_id');
    }

    public function reservas(){
        return $this->hasMany(CadeirasReservas::class, 'user_id');
    }

    public function menus(){
        $permissoes = $this->getAllPermissions()->pluck('name');
        $menus = Menu::all();
        $menusPermitidos = collect([]);

            foreach($menus as $menu){
                if($this->hasPermissionTo('Super Admin') || $menu->permissions->pluck('nome')->intersect($permissoes)->isNotEmpty())
                    $menusPermitidos->push($menu);
            }

        //verifica se algum submenu está sem o menu Pai e adiciona o menu pai à lista
        $menu_sem_pai = 1;
        while($menu_sem_pai > 0){
            $menu_sem_pai = $menusPermitidos->filter(function($m) use ($menusPermitidos){
                if($m->menu_id > 0 && !$menusPermitidos->pluck('id')->contains($m->menu_id)){
                    $menusPermitidos->push($m->menu);
                    return true;
                }
                return false;
            })->count();
        }

        $menusPermitidos = $menusPermitidos->unique('id');

        // pega todos os menus Pai
        $menus = $menusPermitidos->filter(function($x) { return $x->menu_id == null;});
        // Monta os submenus
         foreach($menus as $menu){
            $this->set_sub_menu($menu, $menusPermitidos);
         }

        return $menus;
    }


    private function set_sub_menu($menu, $items){
        // função recursiva para organizar os menus com seus filhos
        $menu->submenus = $items->filter(function($item) use ($menu){ return $item->menu_id === $menu->id;});

        $menu->submenus = $menu->submenus->map(function($dado){
            unset($dado->permissions);
            unset($dado->pivot);
            unset($dado->submenus);
            unset($dado->menu);
            return $dado;
        });

        foreach($menu->submenus as $submenu){
            $this->set_sub_menu($submenu, $items);
        }

        return $menu;

    }


}
