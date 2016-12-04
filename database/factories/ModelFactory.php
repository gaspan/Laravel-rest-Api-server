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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('arjunphp'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Pastor::class, function (Faker\Generator $faker){
    $users = App\User::pluck('id')->toArray();
    return [
        'name' => $faker->unique()->name,
        'description' => $faker->text,
        'user_id' =>$faker->randomElements($users)
    ];
});