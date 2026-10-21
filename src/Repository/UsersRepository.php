<?php

namespace App\Repository;

use PDO;

class UsersRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function emailExists(string $email): int
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM `users` WHERE `email` = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return (int) $stmt->fetchColumn() > 0;
    }

    public function createAccount(string $email, string $passwordHash): int
    {
        $stmt = $this->pdo->prepare("INSERT INTO `users` (`email`, `password_hash`) VALUES (:email, :passwordHash)");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':passwordHash', $passwordHash, PDO::PARAM_STR);
        $stmt->execute();

        return (int) $this->pdo->lastInsertId();
    }
}
