<?php

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "description" => $faker->sentence,
        "user_id" => rand(1,100),
        "quantity" => rand(1,100),
    ];
});
