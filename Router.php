<?php
require_once __DIR__.'/src/controllers/DefaultController.php';
require_once __DIR__.'/src/controllers/SecurityController.php';
require_once __DIR__.'/src/controllers/CarController.php';
require_once __DIR__.'/src/repository/UserRepository.php';

class Router {

    public static $routes;

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view){
        self::$routes[$url] = $view;
    }

    public static function run (string $url) {
        $action = explode("/", $url)[0];
        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';

        if (!Security::checkAccess($controller, $action)) {
            die('No permission');
        }

        $object->$action();

    }
}