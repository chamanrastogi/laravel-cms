<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gallery;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Gallery::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name(),
        'image' => $faker->imageUrl('900','300'),
        'status' => 0
       
    ];
});
