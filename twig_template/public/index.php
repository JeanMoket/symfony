<?php

use EsperoSoft\Faker\Faker;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');

$twig = new Environment($loader, [
    //'cache' => dirname(__DIR__) . '/var/cache',
]);

$faker = new Faker();

$users = [];
for ($i = 0; $i < 5; $i++) {
    $users[$i] = [
        'name' => $faker->full_name(),
        'city' => $faker->city(),
        'age' => rand(5, 30),
        'image' => $faker -> image(),
        'date' => $faker -> datetime()
    ];
}

echo $twig->render('home.html.twig', ['title' => 'Page d\'accueil', 'users' => $users]);