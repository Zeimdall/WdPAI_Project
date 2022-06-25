<?php

class User {
    private $email;
    private $password;
    private $userId;

    public function __construct(string $email, string $password, $userId) {
        $this->email = $email;
        $this->password = $password;
        $this->userId = $userId;
    }

    public function getId()
    {
        return $this->userId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setId($userId): void
    {
        $this->userId = $userId;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}