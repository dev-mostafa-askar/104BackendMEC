<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseEloquentReposiry{
    
    protected $model;
    
    public function __construct(Model $model)
    {   
        $this->model = $model;
    }
    public function all(){
        return $this->model->all();
    }
    public function create($data){
        return $this->model->create($data);
    }
    public function find($id){
        return $this->model->find($id);
    }
    public function update($data,$id){
        return $this->model->find($id)?->update($data,$id);
    }
    public function delete($id){
        return $this->model->find($id)?->delete($id);
    }
    public function uploadFile($file,$path){
        $path = $file->store('public/'."$path");
        $path = str_replace('public','storage',$path);
        return $path;
}
}