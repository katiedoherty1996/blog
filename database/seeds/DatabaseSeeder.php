<?php
namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Database\Seeds\UserSeeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Post::truncate();
        Comment::truncate();
        $faker = Faker::create();

        $user = User::create( 
            [
                'name' => 'KatieDoherty',
                'username' => $faker->unique()->userName,
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
            ]
        );
        

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => '<p>Excerpt for family post</p>',
            'body' => '<p>bcfds hhfuid cvdsghfyu dfghsuihd bjhbdh dhushudi uhidshu huihuds chusihcd bcdyusg dfhuhi</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Excerpt for work post</p>',
            'body' => '<p>bcfds hhfuid cvdsghfyu dfghsuihd bjhbdh dhushudi uhidshu huihuds chusihcd bcdyusg dfhuhi</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => '<p>Excerpt for personal post</p>',
            'body' => '<p>bcfds hhfuid cvdsghfyu dfghsuihd bjhbdh dhushudi uhidshu huihuds chusihcd bcdyusg dfhuhi</p>'
        ]);
    }
}
