<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Post\postRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    private $postRepository;
    private $categoryRepository;

    public function __construct(postRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index(){
        return view('dashboard.post.list-posts',[
            'posts' => $this->postRepository->all()
        ]);
    }

    public function create(){
        return view('dashboard.post.create-post',[
            'categories' => $this->categoryRepository->all(),
        ]);
    }

    public function store(StorePostRequest $request){
        $this->postRepository->customCreate($request->all());
        return redirect('/admin/list-posts')->with('create-success','Post Created Successfully');
    }

    public function edit($id){
        return view('dashboard.post.edit-post',[
            'post' => $this->postRepository->find($id)
        ]);
    }

    public function update(Request $request , Post $post){
        $data = $request->validate([
            'title' => 'required|min:2',
            'description' => 'required|max:500',
            'image' => 'nullable'
        ]);
        // check image still here
        if($request->has('image')){
            // store new image
            $path = $data['image']->store('public/posts-images');
            $path = str_replace('public','storage',$path);
            // $path of new image
            $data['image'] = $path;
            // delete old image
            Storage::disk('public')->delete($post->image);
        }
        else{
            unset($data['image']);
        }
        $post->update($data);
        // redirect
        return redirect(route('posts.index'))->with('update-success' , 'Post updated successfully');
    }

    public function delete(Post $post){
        if($post){
            $image = $post->image;
            // delete image from storage
            Storage::disk('public')->delete($image);
            // delete post
            $post->delete();
            return redirect(route('posts.index'))->with('delete-success', 'Post deleted successfully');
            // redirect with message
        }
        // redirect with error message
        return redirect(route('posts.index'))->with('delete-error', 'Post not found');
    }
}
