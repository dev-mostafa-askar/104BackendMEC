<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository )
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(){
        return view('dashboard.caregory.list-categories',[
            'categories' => $this->categoryRepository->all()
        ]);
    }

    public function create(){
        return view('dashboard.caregory.create-category');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->customCreate($request->all());
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
