<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){
        if($this->isPost()) {

            $email = $_POST['email'];
            $password = md5($_POST['password']);

            if(!$email || !$password){
                return $this->render('loginpage', ['messages' => ['Please fill all of the inputs']]);
            }

            $user = $this->userRepository->getUser($email);

            if (!$user) {
                return $this->render('loginpage', ['messages' => ['User does not exist!']]);
            }

            if ($user->getPassword() !== $password) {
                return $this->render('loginpage', ['messages' => ['Wrong password!']]);
            }
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['userId'] = $user->getId();
            $_SESSION['logged_in'] = true;
            Security::$user = $user;

            $url = "http://$_SERVER[HTTP_HOST]";
            if ($user->getRole() === 'admin') {
                header("Location: {$url}/adminpage");
            } else {
                header("Location: {$url}/mainpage");
            }
        } elseif($_SESSION['logged_in']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/mainpage");
        } else {
            return $this->render('loginpage');
        }
    }

    public function logout()
    {
        if($this->isPost()){
            session_unset();
            unset($_SESSION['email']);
            unset($_SESSION['userId']);
            unset($_SESSION['logged_in']);
            Security::$user = null;
            session_destroy();

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/loginpage");
        }elseif(!$_SESSION['logged_in']){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/loginpage");
        }else{
            return $this->render('loginpage', ['messages' => ['You have been successfully logged out!']]);
        }

    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirm-password'];

        if ($email == null || $password == null || $confirmedPassword == null){
            return $this->render('register', ['messages' => ['Please fill all of the inputs']]);
        }

        if(strlen($email)>50 || strlen($password)>100){
            return $this->render('register', ['messages' => ['Please provide a valid data']]);
        }

        if(!preg_match('/\S+@\S+\.\S+/', $email)){
            return $this->render('register', ['messages' => ['Wrong email format']]);
        }

        $login_validation = $this->userRepository->getUser($email);
        if ($login_validation){
            return $this->render('register', ['messages' => ['User already exists']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, md5($password));

        $this->userRepository->addUser($user);

        return $this->render('loginpage', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}