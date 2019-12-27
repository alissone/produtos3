<?php

/** @var Factory $factory */

use App\Category;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(3, 0, 9),
        'quantity' => $faker->randomNumber(1),
        'category_id' => factory(Category::class)->create()->id,
    ];
});

