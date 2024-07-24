<?php

namespace App\Models\Assinaturas;

use App\Models\Traits\CreateCustomer;
use Illuminate\Database\Eloquent\Model;

class PassaporteUsuario extends Model
{
    use CreateCustomer;
    protected $table = "passaporte_user";
}
