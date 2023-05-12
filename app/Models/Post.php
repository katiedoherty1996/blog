<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //specifies which attributes can be mass assigned, the only ones allowed is title you cannot mass assign other attributes like body or excerpt
    //Imagine if the user sneaks in some attributes and upgrades their services to a premium subscription
    // protected $fillable = ['title', 'excerpt', 'body'];

    //everything can be mass asigned except the id
    protected $guarded = ['id'];

    //reduces the amount of queries as they grab them by category and author
    protected $with = ['category', 'author'];

    //elequent relationship
    public function category(){
        //may relationships hasOne, has Many, belongsTo, belongsToMany
        //we have one post which belongs to one category this a relations ship
        return $this->belongsTo(Category::class);
    }

    //eleqouent relationship, one post belongs to one user
    public function author(){ // assumes foreign key is called author_id
        return $this->belongsTo(User::class, 'user_id');
    }
}