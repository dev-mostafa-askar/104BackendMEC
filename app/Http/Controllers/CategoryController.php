<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index(){
        // return view with categories
        return view('dashboard.caregory.list-categories',[
            'categories' => Category::all()
        ]);
    }

    public function create(){
        //return view to create
        return view('dashboard.caregory.create-category');
    }

    public function store(Request $request){
        // validate
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required|min:8',
            'image' => 'required|image',
        ]);
        // prepare data (store image and return path)
        if($request->has('image')){
            $path = $data['image']->store('public/categories');
            $path = str_replace('public','storage',$path);
            $data['image'] = $path;
        }
        // store in database
        Category::create($data);
        // redirect to categories index
        return redirect('admin/list-categories')->with('create-success','Category created successfully!');
    }

    public function edit(Category $category){
        //return view with $category
        return view('dashboard.caregory.edit-category',compact('category'));
    }


    public function update(Request $request, Category $category){
        //validation on request and category
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required|min:6',
            'image' => 'nullable'
        ]);
        // prepare data (store image and return path)
        if($request->has('image')){
            $oldImage = $category->image;
            $path = $data['image']->store('public/categories');
            $path = str_replace('public','storage',$path);
            $data['image'] = $path;
            Storage::disk('public')->delete($oldImage);
        }
        // update this category model in database
        $category->update($data);
        // redirect
        return redirect('admin/list-categories')->with('update-success','Category updated successfully');
    }

    public function delete(Category $category){
        // check
        if($category){
            // delete this category
            $category->delete();
            return redirect('admin/list-categories')->with('delete','Category deleteded successfully!');
        }
        // redirect
        return redirect('admin/list-categories')->with('error','Category deleteded successfully!');
    }


}
