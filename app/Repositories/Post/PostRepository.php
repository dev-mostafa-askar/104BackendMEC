<?php 

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;

interface postRepository extends BaseRepository{
  
    public function customCreate($data);
} 