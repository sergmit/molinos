<?php

/** @var Factory $factory */

use App\Models\Feedback;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'question' => $faker->text(100),
        'name' => $faker->name,
        'email' => $faker->email
    ];
});
