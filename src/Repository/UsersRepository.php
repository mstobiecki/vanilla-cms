<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;

class UsersRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function emailExists(string $email): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM `users` WHERE `email` = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return (int) $stmt->fetchColumn() > 0;
    }

    public function emailExistsForOtherUser(int $userId, string $email): bool
    {
        $stmt = $this->pdo->prepare("SELECT 1 FROM `users` WHERE `email` = :email AND `id` != :userId LIMIT 1");
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn() !== false;
    }

    public function usernameExistsForOtherUser(int $userId, string $username): bool
    {
        $stmt = $this->pdo->prepare("SELECT 1 FROM `users` WHERE `username` = :username AND `id` != :userId LIMIT 1");
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn() !== false;
    }
    public function usernameExists(string $username): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return (int) $stmt->fetchColumn() > 0;
    }

    public function createAccount(string $email, string $username, string $passwordHash): int
    {
        $stmt = $this->pdo->prepare("INSERT INTO `users` (`email`, `username`, `password_hash`) VALUES (:email, :username, :passwordHash)");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':passwordHash', $passwordHash, PDO::PARAM_STR);
        $stmt->execute();

        return (int) $this->pdo->lastInsertId();
    }

    public function findUserByEmail(string $email): ?array
    {
        $stmt = $this->pdo->prepare("SELECT `id`, `password_hash` FROM `users` WHERE `email` = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function findUserById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT `id`, `role` FROM `users` WHERE `id` = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function findPasswordHashById(int $userId): ?string
    {
        $stmt = $this->pdo->prepare("SELECT `password_hash` FROM `users` WHERE `id` = :userId");
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $hash = $stmt->fetchColumn();

        return $hash === false ? null : (string) $hash;
    }

    public function findUserProfileById(int $userId): ?array
    {
        $stmt = $this->pdo->prepare("SELECT `email`, `username`, `password_hash` FROM `users` WHERE `id` = :userId");
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function fetchUserProfile(int $userId): ?array
    {
        $stmt = $this->pdo->prepare("SELECT `id`, `username`, `email` FROM `users` WHERE `id` = :userId");
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    public function updateProfile(int $userId, string $username, string $email): void
    {
        $stmt = $this->pdo->prepare(
            "UPDATE `users` SET `username` = :username, `email` = :email WHERE `id` = :userId"
        );
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updatePasswordAccount(int $userId, string $passwordHash): void
    {
        $stmt = $this->pdo->prepare("UPDATE `users` SET `password_hash` = :passwordHash WHERE `id` = :userId");
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':passwordHash', $passwordHash, PDO::PARAM_STR);
        $stmt->execute();
    }
}
