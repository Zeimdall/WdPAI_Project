<?php

class Car
{
    private $id;
    private $car_name;
    private $car_year;
    private $car_specification;
    private $image;

    public function __construct($car_name, $car_year, $car_specification, $image, $id = null)
    {
        $this->car_name = $car_name;
        $this->car_year = $car_year;
        $this->image = $image;
        $this->car_specification = $car_specification;
        $this->id = $id;
    }

    public function getCarName()
    {
        return $this->car_name;
    }

    public function setCarName($car_name): void
    {
        $this->car_name = $car_name;
    }

    public function getCarYear()
    {
        return $this->car_year;
    }

    public function setCarYear($car_year): void
    {
        $this->car_year = $car_year;
    }

    public function getCarSpecification()
    {
        return $this->car_specification;
    }

    public function setCarSpecification($car_specification): void
    {
        $this->car_specification = $car_specification;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
}