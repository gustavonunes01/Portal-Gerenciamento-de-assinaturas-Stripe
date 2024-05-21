<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Common\Pais;
use App\Services\Common\PaisService;

class PaisController extends Controller
{
    protected $model = Pais::class;
    protected $service = PaisService::class;
    protected $domainName = 'Common';
    protected $modelName = 'Pais';
    
    
    protected $validator = [
        'nome' => 'required|string|max:50|unique:paises,nome,#ID',
        'sigla' => 'required|string|max:10|unique:paises,sigla,#ID',
        'ISO2' => 'required|string|max:2|unique:paises,ISO2,#ID',
        'ISO3' => 'required|string|max:3|unique:paises,ISO3,#ID',
        'ISON' => 'required|string|max:3|unique:paises,ISON,#ID',
        'ativo' => 'required'
    ];

    
}
