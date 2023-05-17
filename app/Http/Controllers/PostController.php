<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $currentCategory = Category::firstWhere('slug', request('category'));
        return view('post', [
            'post' => $post,
            'currentCategory' => $currentCategory,
        ]);
    }
}