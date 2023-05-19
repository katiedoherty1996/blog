<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];
    
    //eleqouent relationship, a post can have many comments
    public function post(){
        return $this->belongsTo(Post::class);//laravel will assume the column name is post_id by default cause that is the name of the function
    }

    public function author(){//laravel might think the foreign key is author_id
        return $this->belongsTo(User::class, 'user_id');//be more specific about what column the id for the author is in
    }
}
