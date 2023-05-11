<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password')
            ]);

            $category = Category::create([
                'name' => $faker->word,
                'slug' => $faker->slug
            ]);

            DB::table('posts')->insert([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'slug' => $faker->slug,
                'title' => $faker->sentence,
                'excerpt' => $faker->sentence,
                'body' => $faker->paragraph
            ]);
        }
    }
}