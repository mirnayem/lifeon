<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        factory(User::class, 200)->create()->each(function($user){
            $posts = factory(Post::class, rand(2,15))->make();
            $user->posts()->saveMany($posts);
         });
        
    }
}
