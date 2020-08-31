<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

protected $fillable = ['name', 'description', 'slug'];
$factory->define(\App\Category::class, function (Faker $faker) {
    return [
       'name' = > $faker->name,
       'description' => $faker->setence,
       'slug' =>$faker->slug
    ];
});
