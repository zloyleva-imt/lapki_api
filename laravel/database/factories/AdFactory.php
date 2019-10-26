<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ad;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    $users = \App\Models\User::all();
    return [
        'title' => $faker->sentence(),
        'body' => $faker->paragraph(),
        'user_id' => $users->random()->id,
        'status' => $faker->randomElement(config('app.adds_status'))
    ];
});
