<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
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
}