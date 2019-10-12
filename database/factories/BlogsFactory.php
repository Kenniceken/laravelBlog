<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence(5),
        'body' => $faker->sentence(80),
    ];
});




