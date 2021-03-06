<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(User::class, function (Faker $faker) {
    //$active = $faker->boolean;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => User::ROLE_USER,
        //'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //'remember_token' => Str::random(10),
        //'verify_token' => $active ? null : Str::uuid(),
    ];
});
