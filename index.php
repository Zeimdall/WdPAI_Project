<?php

require 'router.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('loginpage', 'DefaultController');
Router::get('mainpage', 'DefaultController');
Router::get('services', 'DefaultController');
Router::get('choosecar', 'DefaultController');
Router::get('cars', 'CarController');
Router::get('contact', 'DefaultController');

Router::get('login', 'SecurityController');
Router::get('register', 'SecurityController');
Router::get('logout', 'SecurityController');

Router::run($path);