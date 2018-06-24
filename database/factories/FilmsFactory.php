<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Film::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 50) ,
        'release_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'rating' => 3,
        'ticket_price' => $faker->randomDigit,
        'country' => function() {
            return factory(App\Country::class)->create()->id;
        },
        'slug' => $faker->slug,
        'photo' => 'default.png',
    ];
});
