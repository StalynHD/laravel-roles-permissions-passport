<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

	$author = App\User::whereHas('roles', function($user){
		$user->where('roles.id', 2);
	})->get()->random(1)->first();

    return [
        'title' => 'Hello world',
        'body' => 'Lorem ipsum dolore',
        'user_id' => $author->id
    ];
});
