<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        //latest function orders each of the posts from the latest created at the top
        $posts = Post::latest('created_at')->with('category', 'author')->get();
 
        return view('posts', [
            'posts' => $posts,
            'categories' => Category::all()
        ]);

    }
}