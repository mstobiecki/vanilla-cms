<?php

namespace App\Repository;

use PDO;

class ArticlesRepository
{
    public function __construct(private PDO $pdo)
    {
    }
}
