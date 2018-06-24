<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        //
        'comment' => $faker->paragraph(1),
        'name' => function() {
            return factory(App\User::class)->create()->name;
        },
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'film_id' => function() {
            return factory(App\Film::class)->create()->id;
        },
    ];
});
