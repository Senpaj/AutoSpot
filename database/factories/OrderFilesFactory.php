<?php

use Faker\Generator as Faker;

$factory->define(App\OrderFiles::class, function (Faker $faker) {
    return [
        'path' => ($faker->numberBetween(1, 7) . ".jpg"),                                             
        'fk_MotoOrderid_MotoOrder' => $faker->numberBetween(464, 763)
    ];
});
