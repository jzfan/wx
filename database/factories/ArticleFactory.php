<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'cover' => 'https://unsplash.it/320/180?' . $faker->randomNumber(),
        'content' => $faker->paragraph()
    ];
});
