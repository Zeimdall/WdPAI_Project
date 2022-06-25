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
        session_start();

        if($this->isPost()) {

            $email = $_POST['email'];
            $password = md5($_POST['password']);

            if(!$email || !$password){
                return $this->render('login', ['messages' => ['Please fill all of the inputs']]);
            }

            $user = $this->userRepository->getUser($email);

            if (!$user) {
                return $this->render('login', ['messages' => ['User does not exist!']]);
            }

            if ($user->getPassword() !== $password) {
                return $this->render('login', ['messages' => ['Wrong password!']]);
            }
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['userId'] = $user->getId();
            $_SESSION['logged_in'] = true;

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/mainpage");
        } elseif($_SESSION['logged_in']) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/mainpage");
        } else {
            return $this->render('login');
        }

    }

    public function logout(){
        session_start();

        if($this->isPost()){
            session_unset();
            unset($_SESSION['email']);
            unset($_SESSION['userId']);
            unset($_SESSION['logged_in']);
            session_destroy();

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }elseif(!$_SESSION['logged_in']){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }else{
            return $this->render('login');
        }

    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        if (!$email || !$password || !$confirmedPassword){
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

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/register");

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}