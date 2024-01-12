<?php 

namespace App\Repositories\Category\Eloquent;

use App\Repositories\BaseEloquentReposiry;
use App\Repositories\Category\CategoryRepository;

class EloquentCategoryRepository extends BaseEloquentReposiry implements CategoryRepository{

    public function customCreate($data){
        unset($data['_token']);
        if($data['image']){
            $data['image'] = $this->uploadFile($data['image'],'categories-images');
        }
        return $this->create($data);
    }
}