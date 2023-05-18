<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use App\Models\Post;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => Post::factory(),
        'user_id' => Post::factory(),
        'body' => $this->faker->paragraph
    ];
});
