<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->text,
        'course_id' => 1
    ];
});
