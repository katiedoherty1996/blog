<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $currentCategory = Category::firstWhere('slug', request('category'));
        return view('posts.show', [
            'post' => $post,
            'currentCategory' => $currentCategory,
        ]);
    }

    //show a form to create a post
    public function create()
    {

        if(auth()->guest()){
            // abort(403);
            abort(HttpFoundationResponse::HTTP_FORBIDDEN);
        }

        if(auth()->user()->username != 'katiedoherty123456'){
            abort(HttpFoundationResponse::HTTP_FORBIDDEN);
        }

        return view('posts.create');
    }
}