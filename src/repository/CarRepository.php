<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Car.php';

class CarRepository extends Repository
{
    public function getCar(int $id): ?Car
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.cars WHERE id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($car == false) {
            return null;
        }

        return new Car(
            $car['car_name'],
            $car['car_year'],
            $car['image'],
            $car['car_specification']
        );
    }

    public function addCar(Car $car): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO cars (car_name, car_year, image, car_specification)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $car->getCarName(),
            $car->getCarYear(),
            $car->getImage(),
            $car->getCarSpecification()
        ]);
    }

    public function getCars(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.cars;
        ');

        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($cars as $car) {
            $result[] = new Car(
                $car['car_name'],
                $car['car_year'],
                $car['car_specification'],
                $car['image'],
                $car['id']
            );
        }
        return $result;
    }

    public function rentCar(Car $car, int $userId): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.rented_cars (user_id, car_id) VALUES (?, ?);
        ');
        $stmt->execute([
            $_SESSION['userId'],
            $car->getId()
        ]);
    }
}