<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Car.php';
require_once __DIR__ . '/../repository/CarRepository.php';

class CarController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $carRepository;

    public function __construct()
    {
        parent::__construct();
        $this->carRepository = new CarRepository();
    }

    public function cars()
    {
        session_start();
        $cars = $this->carRepository->getCars();
        $this->render('choosecar', ['choosecar' => $cars]);
    }

    public function addCar()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            $car = new Car($_POST['car_name'], $_POST['car_year'], $_POST['car_specification'], $_FILES['file']['name']);
            $this->carRepository->addCar($car);
        }
        return $this->render('choosecarpage', [
            'messages' => $this->message,
            'cars' => $this->carRepository->getCars()
        ]);
    }

    public function rentCar()
    {
        $body = json_decode(file_get_contents("php://input"));
        $car = $this->carRepository->getCar($body->car_id);
        $this->carRepository->rentCar($car, Security::$user->getId());
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}