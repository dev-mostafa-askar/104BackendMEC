<?php

namespace App\Repositories\Post\Eloquent;

use App\Repositories\BaseEloquentReposiry;
use App\Repositories\Post\postRepository;

class EloquentPostRepository extends BaseEloquentReposiry implements postRepository{

    public function customCreate($data){
        unset($data['_token']);
        if($data['image']){
            $data['image'] = $this->uploadFile($data['image'],'posts-images');
        }
        return $this->create($data);
    }
}