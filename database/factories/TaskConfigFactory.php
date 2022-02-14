<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\TaskConfig;

$factory->define(TaskConfig::class, function (Faker $faker) {
    return [
        'name'             => $faker->colorName,
        'periodicity'      => $faker->randomElement(["daily", "weekly", "monthly"]),
        'value'            => $faker->numberBetween(1, 7),
        'date'             => $faker->dateTime,
        'created_users_id' => \App\User::all()->random()->id,
        'created_at'       => $faker->dateTime()
    ];
});
