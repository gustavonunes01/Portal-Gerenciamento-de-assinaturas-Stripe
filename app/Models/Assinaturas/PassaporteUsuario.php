<?php

namespace App\Models\Assinaturas;

use App\Models\Traits\CreateCustomer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PassaporteUsuario extends Model
{
    use CreateCustomer;
    protected $table = "passaporte_user";

    protected $fillable = [
        "user_id",
        "customer_id",
        "cpf",
        "rg",
        "rua",
        "numero",
        "bairro",
        "cidade",
        "complemento",
        "cep",
        "foto",
        "whatsapp",
        "horas_disponiveis_semanal"
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function assinaturas(){
        return $this->hasMany(Assinaturas::class, "passaporte_id");
    }
}
