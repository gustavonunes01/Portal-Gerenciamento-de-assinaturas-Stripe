<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use App\Exceptions\BusinessException;

abstract class Service {
  protected $model;

  public function __construct() {
    $this->model = $this->resolveModel();
  }

  protected function resolveModel() {
    return app($this->model);
  }

  public function index($params)
    {
        $filter = $this->filter($params);
        return $this->paginate($filter, $params);
    }

  public function paginate(Builder $filter, $params){
    
    $orderBy = $params['order_by'] ?? '';
    $order = $params['order'] ?? 'asc';
    $page = $params['page'] ?? 1;
    $per_page = $params['per_page'] ?? 20;

    if(!$filter)
      $filter = $this->model;
    
    if(strlen($orderBy) > 0)
      $filter->orderBy($orderBy, $order);
        
    return $filter->paginate($per_page, ['*'], 'page', $page);
  }

  public function filter($params):Builder
  {
    return $this->model->query();
  }

 
  public function show(int $id)
  {
      return $this->model::findOrFail( $id);
  }

  public function store(array $request)
  {
    \Log::info("Pais: ", [$request]);
    return $this->model::create($request);
  }

  public function update(int $id, array $fields ) {
    $registro = $this->model::findOrFail($id);
    $registro->fill($fields);
    $registro->save();
    return $registro;
  }

  public function destroy(int $id) {
    try{
        $registro = $this->model->find($id);
        $registro->delete();
        return $registro;
    }catch(QueryException $e){
        $errorMessage = $e->getMessage();
        $matches = '';
        if ($e->getCode() === '23000' || $e->getCode() === '23503') { // 23000 é o código de erro SQL para 'violação de restrição de integridade'
            preg_match('/referenced from table "(.*?)"/', $errorMessage, $matches);
            if (isset($matches[1])) {
                $tableName = $matches[1];
                $errorMessage = "Este Registro não pode ser excluído porque está sendo utilizado na tabela $tableName";
            }else{
                $errorMessage = "Este registro não pode ser excluído porque está sendo usado em outra tabela";
            }
            $x = $e->getMessage();
            throw BusinessException::error($errorMessage);
        }
    }catch(\Exception $e){
        throw $e;
    }

  }

}
