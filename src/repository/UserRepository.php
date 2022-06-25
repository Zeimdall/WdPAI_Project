<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':login', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$user){
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['role_id'],
            $user['user_id']
        );

    }

    public function addUser(User $user) {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, role_id)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword()
        ]);
    }

    public function deleteUser(string $email): bool{

        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        return $stmt->execute() === true;

    }
}