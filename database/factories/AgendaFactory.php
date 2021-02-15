<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agenda;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Agenda::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'tanggal' => date($format = 'Y-m-d', $max = 'now'),
        'jam' => time($format = 'H:i:s', $max = 'now'),
        'nama_kegiatan' => $faker->text(50),
        'tempat' => $faker->city,
        'disposisi' => $faker->text(50),
        'slide' => rand(1, 3)
    ];

    // php artisan tinker
    // factory(App\Agenda::class,50)->create();

});
