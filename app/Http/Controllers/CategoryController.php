<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('posts.show', [
            'posts' => $category->posts,
            'currentCategory' => $category,
            'categories' => Category::all()
        ]);
    }
}
