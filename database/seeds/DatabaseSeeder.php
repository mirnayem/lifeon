<?php

use App\Category;
use App\Comment;
use App\Image;
use App\Post;
use App\Reply;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        // $this->call(PostTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(ReplyTableSeeder::class);
        

     

        $categories = Category::all();

        // Populate the pivot table
        Post::all()->each(function ($post) use ($categories) { 
            $post->categories()->sync(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });

        $tags = Tag::all();

            // Populate the pivot table
            Post::all()->each(function ($post) use ($tags) { 
                $post->tags()->sync(
                    $tags->random(rand(1, 3))->pluck('id')->toArray()
                ); 
            });
        $images = Image::all();

         // Populate the pivot table
         Post::all()->each(function ($post) use ($images) { 
            $post->images()->sync(
                $images->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });

    }
}
