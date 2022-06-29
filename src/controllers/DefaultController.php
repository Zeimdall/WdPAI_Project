<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('loginpage');
    }

    public function loginpage()
    {
        $this->render('loginpage');
    }

    public function adminpage()
    {
        $this->render('adminpage');
    }

    public function mainpage()
    {
        $this->render('mainpage');
    }

    public function services()
    {
        $this->render('servicespage');
    }
    public function choosecar()
    {
        $this->render('choosecarpage');
    }
    public function contact()
    {
        $this->render('contactpage');
    }

    public function logout()
    {
        $this->render('loginpage');
    }
}