<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
       'title' => $faker->words(3 , true),
       'content' => $faker->paragraph()

    ];
});
