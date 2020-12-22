<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Goal;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Goal::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => Str::random(25),
        'goal' => rand(100000, 9999999),
        'saved' => rand(0, 100000),
        'last' => 0,
        'limit_day' => now(),
    ];
});
