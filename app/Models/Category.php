<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id';
    //what is the connection between a category and a post
    //A category can have many posts hasMany
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
