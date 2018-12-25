<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {

	$author = App\User::all()->random(1)->first();
	$post = App\Post::all()->random(1)->first();

    return [
        'body' => 'Good video, congratulations',
        'user_id' => $author->id,
        'post_id' => $post->id,
    ];
});
