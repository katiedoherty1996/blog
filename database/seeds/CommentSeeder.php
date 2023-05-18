<?php 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    public function run(){
        $faker = Faker::create();
        // Assuming you have access to an instance of Faker, you can generate fake data directly
        $faker = \Faker\Factory::create();

        // Generate a random post ID
        $postId = Post::inRandomOrder()->first()->id;

        // Generate a random user ID
        $userId = User::inRandomOrder()->first()->id;

        // Create an instance of the Comment model and set the attributes
        foreach (range(1, 10) as $index) {
            Comment::create([
                'post_id' => $postId,
                'user_id' => $userId,
                'body' => $faker->paragraph,
            ]);
        };
    }
}