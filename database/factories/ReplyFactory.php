<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Reply;
use App\User;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'body' => $faker->paragraph,
        'comment_id' => Comment::all()->random()->id,
    ];
});
