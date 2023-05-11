<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\File;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function(){

//     $posts = Post::all();
 
//     return view('posts', [
//         'posts' => $posts
//     ]);
// });

// Route::get('categories/{category}', function (Category $category) {
//     dd($category);
//     return view('posts', [
//         'posts' => $category->posts
//     ]);
// });

Route::get('/', 'HomeController@index');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/categories/post/{slug}', [CategoryController::class, 'show'])->name('category.posts');

Route::get('/authors/posts/categories/{author:name}', function(User $author){
    return view('posts', [
        'posts' => $author->posts
    ]);
});

// Route::get('categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

//when passing in post, the wildcard name has to match the var name {post} $post
// Route::get('posts/{post:slug}', function (Post $post) {// give me the post where the slug matches the slug you provided
// //trying to access things that dont exist will return a 404 because it hasnt got an existing slug
//     return view('post', [
//         'post' => $post
//     ]);
// });


