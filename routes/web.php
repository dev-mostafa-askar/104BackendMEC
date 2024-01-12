<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ClientPostController::class, 'index']);
Route::get('/post/{post}', [ClientPostController::class,'show']);

Route::get('/login', [AuthController::class,'create'])->name('login')->middleware('guest');
Route::post('/user/login',[AuthController::class,'login'])->name('post.login')->middleware('guest');
Route::get('/register' , [AuthController::class,'register'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class,'post_register'])->name('post-register')->middleware('guest');
Route::get('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');
// role

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard',[UserController::class , 'dashboard']);
    Route::get('/list-users',[ UserController::class , 'index']);
    Route::get('/create-user',[ UserController::class , 'create']);
    Route::post('/store-user',[UserController::class,'store']);
    Route::get('/edit-user/{user}',[ UserController::class , 'edit']);
    Route::post('/update-user/{user}',[UserController::class,'update']);
    Route::get('/delete-user/{user}' , [UserController::class , 'delete']);

    Route::get('/list-posts',[ PostController::class , 'index'])->name('posts.index');
    Route::get('/create-post',[ PostController::class , 'create']);
    Route::post('/store-post',[PostController::class,'store']);
    Route::get('/edit-post/{post}',[ PostController::class , 'edit']);
    Route::post('/update-post/{post}',[PostController::class,'update']);
    Route::get('/delete-post/{post}' , [PostController::class , 'delete']);

    Route::get('/list-categories',[ CategoryController::class , 'index']);
    Route::get('/create-category',[ CategoryController::class , 'create']);
    Route::post('/store-category',[CategoryController::class,'store']);
    Route::get('/edit-category/{category}',[ CategoryController::class , 'edit']);
    Route::post('/update-category/{category}',[CategoryController::class,'update']);
    Route::get('/delete-category/{category}' , [CategoryController::class , 'delete']);
});


