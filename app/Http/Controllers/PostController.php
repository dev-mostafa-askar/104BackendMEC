<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('dashboard.post.list-posts',[
            'posts' => $posts
        ]);
    }

    public function create(){
        $categories  = Category::all();
        return view('dashboard.post.create-post',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request){

        $data = $request->validate([
            'title' => 'required|min:2',
            'description' => 'required|max:500',
            'image' => 'required|image',
            'category_id' => 'required'
        ]);

        if($request->has('image')){
            $path = $data['image']->store('public/posts-images');
            $path = str_replace('public' , 'storage',$path);
            $data['image'] = $path;
        }
        $data['user_id'] = Auth::user()->id;
        Post::create($data);
        return redirect('/admin/list-posts')->with('create-success','Post Created Successfully');
    }

    public function edit(Post $post){
        return view('dashboard.post.edit-post',[
            'post' => $post
        ]);
    }

    public function update(Request $request , Post $post){
        $data = $request->validate([
            'title' => 'required|min:2',
            'description' => 'required|max:500',
            'image' => 'nullable'
        ]);

        // check image still here
        // store new image
        // delete old image
        // $path of new image
        // $data['image'] = $path
        // redirect
    }

    public function delete(Post $post){
        if($post){
            $image = $post->image;
            // delete image from storage
            // delete post
            // redirect with message
        }
        // redirect with error message
    }
}
