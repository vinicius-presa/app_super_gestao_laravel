<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
       
        'name' => $faker->name,
        'telefone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'motivo_contato' => $faker->numberBetween(1,3),
        'mensagem' => $faker->text(200)
    ];
});
