<?php

class Security {

    public static $user;
    public static $privs;

    public function __construct()
    {
        session_start();
        $userRepository = new UserRepository();
        if ($_SESSION['email']) {
            self::$user = $userRepository->getUser($_SESSION['email']);
        }
    }

    public static function checkAccess($controller, $action) {
        $roles = self::$privs[$controller][$action];
        if (!$roles) {
            return true;
        }

        if (!self::$user) {
            return false;
        }

        if (!in_array(self::$user->getRole(), $roles)) {
            return false;
        }

        return true;
    }
}