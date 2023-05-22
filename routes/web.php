<?php

// require_once '/path/to/MailchimpMarketing/vendor/autoload.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Services\MailChimpNewsletter;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function(){

//     $posts = Post::all();
 
//     return view('posts', [
//         'posts' => $posts
//     ]);
// });

// Route::get('categories/{category}', function (Category $category) {
//     dd($category);
//     return view('posts', [
//         'posts' => $category->posts
//     ]);
// });

// Route::get('newsletter', function () {

//     request()->validate(['email'=> 'required|email']);

//     $apiKey = '538f5f8b4729a5020cef4e49cb7e7f01-us21';
//     $listId = '8934e6906e';
//     $url = "https://us21.api.mailchimp.com/3.0/lists/{$listId}/members";

//     $client = new Client([
//         'verify' => false,
//         'headers' => [
//             'Authorization' => 'Bearer ' . $apiKey,
//             'Content-Type' => 'application/json',
//         ],
//         'json' => [
//             "email_address" => request('email'),
//             "status" => "subscribed",
//         ],
//     ]);

//     $client->post($url);

//     return redirect('/')->with('success', 'You are now signed up for our newsletter!');
// });

Route::post('newsletter', NewsletterController::class);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

//create the route to log in
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

//creating a new user
//middleware is a piece of logic that will run whenever a new request is made
//oppportunity to inspect the logic and do something with it.
//Only a guest can access this page
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

//create the route where we post to create the user
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//create the route to log out
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//create the route to log in
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');


//create the route to log out
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

//WE DONT NEED ROUTES FOR CATEGORY OR AUTHOR ANYMORE BECAUSE WE ARE SEARCHING FOR THEM BY SEARCH. CHECK HOMECONTROLLER.PHP
// Route::get('/categories/post/{slug}', [CategoryController::class, 'show'])->name('category.posts');

// Route::get('/authors/posts/categories/{author:username}', function(User $author){
//     return view('posts.index', [
//         'posts' => $author->posts,
//     ]);
// });

// Route::get('categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

//when passing in post, the wildcard name has to match the var name {post} $post
// Route::get('posts/{post:slug}', function (Post $post) {// give me the post where the slug matches the slug you provided
// //trying to access things that dont exist will return a 404 because it hasnt got an existing slug
//     return view('post', [
//         'post' => $post
//     ]);
// });

//ADMIN SECTION
Route::get('admin/posts/create', [PostController::class, 'create']);


