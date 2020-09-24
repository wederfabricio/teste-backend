<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\People::class, function (Faker $faker) {
    return [
        'code' => $this->faker->name,
        'name' => $this->faker->name, 
        'gender' => 'Male', 
        'age' => $this->faker->year, 
        'eye_color' => $this->faker->colorName, 
        'hair_color' => $this->faker->colorName
    ];
});
