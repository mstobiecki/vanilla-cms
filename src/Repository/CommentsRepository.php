<?php

namespace App\Repository;

use PDO;

class CommentsRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function createComment(int $articleId, int $userId, string $content): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO (`article_id`, `user_id`, `content`) VALUES (:articleId, :userId, :content)");
        $stmt->bindValue(':articleId', $articleId, PDO::PARAM_INT);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->execute();

    }
}
