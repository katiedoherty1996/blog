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
        // $posts = Post::latest('created_at')->with('category', 'author')->get();

        // $posts = Post::latest();

        //we are calling a query scope from Post class and passing in the array of the search
        $posts = Post::latest()->filter(request(['search', 'category']))->get();

        return view('posts', [
            'posts' => $posts,
            'currentCategory' => Category::firstWhere('slug', request('category')),
        ]);

    }
}