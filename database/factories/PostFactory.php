<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words(10 ,true),
        'body' => $faker->paragraph(10 ,true),
         'slug' => $faker->slug,
        'user_id'=> User::all()->random()->id,
    ];
});
