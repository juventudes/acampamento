<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Assinatura::class, function($faker){
    $local_politico = $faker->randomElement([
        "Ocupa",
        "Movimento",
        "União",
        "Sindicato",
    ]);

    $local_politico .= " ".$faker->randomElement([
        strtoupper("UF".$faker->randomLetter.$faker->randomLetter),
        strtoupper("IF".$faker->randomLetter.$faker->randomLetter),
        "Sem Terra",
        "Metalúrgicos",
        "Engenheiros",
    ]);
    return[
       'nome' => $faker->name,
       'email' => $faker->email,
       'telefone' => $faker->phoneNumber,
       'local' => $faker->city,
       'local_politico' => $local_politico,
    ];
});
