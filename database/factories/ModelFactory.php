<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'id'	=> $faker->uuid,
        'username' => $faker->username,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
        'id'    => $faker->uuid,
    	'user_id'	=> function() {
    		return factory(App\User::class)->create()->id;
    	},
        'name' => $faker->sentence,
        'slug' => $faker->slug,
        'description' => $faker->paragraph,
        'price' => $faker->randomNumber(2),
    ];
});
