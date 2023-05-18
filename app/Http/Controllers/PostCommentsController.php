<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentsController extends Controller
{
    //adds a comment to a post
    public function store(Post $post){

        $post->comments()->create([
            
        ])
    }
}
