<?php

require 'Router.php';
require_once __DIR__.'/Security.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('loginpage', 'DefaultController');
Router::get('adminpage', 'DefaultController');
Router::get('mainpage', 'DefaultController');
Router::get('services', 'DefaultController');
Router::get('choosecar', 'DefaultController');
Router::get('cars', 'CarController');
Router::get('contact', 'DefaultController');
Router::post('addCar', 'CarController');
Router::post('rentCar', 'CarController');

Router::get('login', 'SecurityController');
Router::get('register', 'SecurityController');
Router::get('logout', 'SecurityController');

Security::$privs = [
    'DefaultController' => [
        'index' => null,
        'loginpage' => null,
        'adminpage' => ['admin'],
        'mainpage' => ['user'],
        'services' => ['user'],
        'choosecar' => ['admin', 'user'],
        'contact' => ['user']
    ],
    'CarController' => [
        'cars' => ['admin', 'user'],
        'addCar' => ['admin'],
        'rentCar' => ['admin', 'user']
    ],
    'SecurityController' => [
        'login' => null,
        'register' => null,
        'logout' => null
    ]
];

new Security();

Router::run($path);