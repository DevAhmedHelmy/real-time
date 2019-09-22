<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Model\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'user_id' => function(){
            return User::all()->random();
        }

    ];
});
