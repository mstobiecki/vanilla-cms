<?php

namespace App\Repository;

use PDO;

class UsersRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function createAccount(string $email, string $passwordHash)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `users` (`email`, `passwordHash`) VALUES (:email, :passwordHash)");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':passwordHash', $passwordHash, PDO::PARAM_STR);
        $stmt->execute();
    }
}
