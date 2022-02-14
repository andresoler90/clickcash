<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\TaskDetail;

$factory->define(TaskDetail::class, function (Faker $faker) {
    return [
        'task_config_id'    => \App\Models\TaskConfig::all()->random()->id,
        'description'       => $faker->realText(),
        'link'              => $faker->url,
        'created_user'  => \App\User::all()->random()->id,
        'created_at'      => $faker->dateTime()
    ];
});
