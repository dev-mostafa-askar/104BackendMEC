<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('index',[
            'posts' => $posts
        ]);
    }

    public function show(Post $post){        
        return view('post',[
            'post' => $post
        ]);
    }
}
