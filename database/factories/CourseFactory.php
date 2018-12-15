<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'image' => $faker->imageUrl(640, 480, 'cats'),
        'user_id' => 1
    ];
});
