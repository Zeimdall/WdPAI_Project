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
            INSERT INTO projects (car_name, car_year, image, car_specification)
            VALUES (?, ?, ?, ?)
        ');

        $assignedById = 1;

        $stmt->execute([
            $car->getCarName(),
            $car->getCarYear(),
            $car->getImage(),
            $car->getCarSpecification(),
            $assignedById
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
            $result = new Car(
                $car['car_name'],
                $car['car_year'],
                $car['image'],
                $car['car_specification'],
                $car['id']
            );
        }
        return $result;
    }
}