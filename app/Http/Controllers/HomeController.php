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
        //paginate will add various pages to the application and only show 6 posts per page and the withQueryString() 
        //will keep the users entered search filters
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
        $currentCategory = Category::firstWhere('slug', request('category'));

        // return view('posts.index', [
        //     'posts' => $posts,
        //     'currentCategory' => $currentCategory,
        // ]);

        return view('posts.index', [
            'posts' => $posts,
            'currentCategory' => $currentCategory,
        ]);

    }
}