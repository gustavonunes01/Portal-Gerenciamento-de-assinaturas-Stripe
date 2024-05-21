<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use Log;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Exceptions\UnauthorizedException;
use App\Exceptions\BusinessException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Routing\Controller as BaseControllerIlluminate;

abstract class Controller extends BaseControllerIlluminate
{
    use AuthorizesRequests, ValidatesRequests;

    protected $model;
    protected $service;
    protected $domainName;
    protected $modelName;
    protected $validator = [];
    
    public function __construct() {
      $this->model   = app($this->model);
      $this->service = new $this->service();
    }
  
 

    /**
     * Nas classes filhas deve retornar a model que resolve, bem como as permissões para cada método caso necessário e/ou validators
     * 
     * protected function resolveModel() {
     *  return app(\App\Models\User::class);
     * }
     */

    public function index(Request $request){
        try {
            $this->checkPermissions($this->domainName, $this->modelName, 'index' );
            $data = $this->service->index($request->all());
            return response()->json($data, 200);
        } catch (\App\Exceptions\BusinessException $e) {
            return $this->responseError($e->getMessage(), $e->getStatusCode());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError('Ocorreu um erro ao tentar executar esta ação. Entre em contato com o suporte!', 400);
        }
    }

    public function store(Request $request){
        if($this->validator){
            foreach ($this->validator as &$elemento) {
                // Verifica se o elemento é uma string
                if (is_string($elemento)) {
                    // Substitui o texto '#ID' pela variável
                    $elemento = str_replace('#ID', '0', $elemento);
                }
            }
            
            
            $this->validate($request, $this->validator);
        }
        try {
            $this->checkPermissions($this->domainName, $this->modelName, 'store' );
            $data = $this->service->store($request->all());
            return response()->json($data, 200);
        } catch (\App\Exceptions\BusinessException $e) {
            return $this->responseError($e->getMessage(), $e->getStatusCode());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError('Ocorreu um erro ao tentar executar esta ação. Entre em contato com o suporte!', 400);
        }
    }
    
    public function update(Request $request, $id){   
        if($this->validator){
            foreach ($this->validator as &$elemento) {
                // Verifica se o elemento é uma string
                if (is_string($elemento)) {
                    // Substitui o texto '#ID' pela variável
                    $elemento = str_replace('#ID', $id, $elemento);
                }
            }
            $this->validate($request, $this->validator);
        }
        try {
            $this->checkPermissions($this->domainName, $this->modelName, 'update' );
            $data = $this->service->update($id,$request->all());
            return response()->json($data, 200);
        } catch (\App\Exceptions\BusinessException $e) {
            return $this->responseError($e->getMessage(), $e->getStatusCode());
        } catch (ModelNotFoundException $e) {
            return $this->responseError(['error' => 'Este recurso não foi encontrado'], 404);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError('Ocorreu um erro ao tentar executar esta ação. Entre em contato com o suporte!', 400);
        }
    }
    
    public function show($id){        
        try {
            $this->checkPermissions($this->domainName, $this->modelName, 'show' );
            $data = $this->service->show($id);
            return response()->json($data, 200);
        } catch (\App\Exceptions\BusinessException $e) {
            return $this->responseError($e->getMessage(), $e->getStatusCode());
        } catch (ModelNotFoundException $e) {
            return $this->responseError(['error' => 'Este recurso não foi encontrado'], 404);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError('Ocorreu um erro ao tentar executar esta ação. Entre em contato com o suporte!', 400);
        }
    }

    public function destroy($id){
        try {
            $this->checkPermissions($this->domainName, $this->modelName, 'destroy' );
            $data = $this->service->destroy($id);
            return response()->json($data, 200);
        } catch (\App\Exceptions\BusinessException $e) {
            return $this->responseError($e->getMessage(), $e->getStatusCode());
        } catch (ModelNotFoundException $e) {
            return $this->responseError(['error' => 'Este recurso não foi encontrado'], 404);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->responseError('Ocorreu um erro ao tentar executar esta ação. Entre em contato com o suporte!', 400);
        }
    }

    public function checkPermissions($domain, $model, $action){
        $user = Auth::user();
        if($user->hasPermissionTo('Super Admin'))
            return true;
        $permissions = [];
        switch($action){
            case 'index':
            case 'show': $permissions = ["$domain.$model.manipular", "$domain.$model.visualizar", "$domain.$model.inserir", "$domain.$model.editar", "$domain.$model.deletar" ]; break;
            case 'store': $permissions = ["$domain.$model.manipular", "$domain.$model.inserir"]; break;
            case 'update': $permissions = ["$domain.$model.manipular", "$domain.$model.editar"]; break;
            case 'destroy': $permissions = ["$domain.$model.manipular", "$domain.$model.deletar"]; break;
        }
        if(!$user->hasAnyPermission($permissions)){
            throw UnauthorizedException::forPermissions($permissions);
        }
    }


    protected function responseError($message, $status = 400){
        return throw new HttpResponseException(response()->json([
            'errors' => [ [$message] ],
        ], $status));
    }
    
}
