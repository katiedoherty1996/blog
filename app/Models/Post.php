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

    //Query Scopes
    //first argument will always be passed as your query builder so you never have to pass it
    public function scopeFilter($query, array $filters) {

        //SEARCH BY TITLE OR BODY
        //when we have a search filter then trigger this function
        $query->when($filters['search'] ?? false, function ($query, $search) {
            //sql syntax find only those with a title of what was searched for
            //wrapping the query in a where condition so that it searches for the title or body in one where condition rather then 2
            $query->where(function($query) use ($search){
                $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
            });

        });

        //SEARCH BY CATEGORY
        //when we have something for the category that means we want to grab only the posts with the given category
        //not easy cause there is no refernce to the category slug on the post table
        $query->when($filters['category'] ?? false, function ($query, $category) {
            //sql syntax find only those with a title of what was searched for
            // $query
            // ->whereExists(function ($query) use ($category){
            //     $query->from('categories')
            //         ->whereColumn('categories.id', 'posts.category_id')
            //         ->where('categories.slug', $category);
            // });

            //use the whereHas method - where a post has a specific category.
            //give me the posts that has a category specifically the ones that match the category the user has requested
            $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });

        });

        // if($filters['search'] ?? false){
        //     //sql syntax find only those with a title of what was searched for
        //     $query
        //     ->where('title', 'like', '%' . request('search') . '%')
        //     ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        //SEARCH BY AUTHOR
        $query->when($filters['author'] ?? false, function ($query, $author) {
            //what is the relationship between a post and an author 
            //an author has a relationship so we use whereHas
            $query->whereHas('author', function($query) use ($author) {
                //where the username matches the author
                $query->where('username', $author);
            });
        });
    }

    //eleqouent relationship, a post can have many comments
    public function comments(){
        return $this->hasMany(Comment::class);
    }

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