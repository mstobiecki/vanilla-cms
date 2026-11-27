<?php


declare(strict_types=1);

namespace App\Repository;

use PDO;

class UsersListRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function fetchPage(): array
    {
        return $this
        ->pdo
        ->query("SELECT `id`, `email`, `username`, `created_at`, `role`, `is_blocked` FROM `users` ORDER BY `id` DESC")
        ->fetchAll(PDO::FETCH_ASSOC);
    }
}
