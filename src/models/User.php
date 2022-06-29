<?php

class User {
    private $email;
    private $password;
    private $userId;
    private $role;

    public function __construct(string $email, string $password, int $userId = null, string $role = 'user') {
        $this->email = $email;
        $this->password = $password;
        $this->userId = $userId;
        $this->role = $role;
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

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}