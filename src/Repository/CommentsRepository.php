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
        $stmt = $this->pdo->prepare("INSERT INTO comments (`article_id`, `user_id`, `content`) VALUES (:articleId, :userId, :content)");
        $stmt->bindValue(':articleId', $articleId, PDO::PARAM_INT);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->execute();

    }

    public function getCommentsByArticleId(int $articleId): array
    {
        $stmt = $this->pdo->prepare("SELECT 
        `comments`.`id`, `comments`.`article_id`, `comments`.`user_id`, `comments`.`content`, `comments`.`created_at`, `users`.`username` 
        FROM `comments` INNER JOIN `users` ON `comments`.`user_id` = `users`.`id` 
        WHERE `comments`.`article_id` = :articleId 
        ORDER BY `comments`.`created_at` DESC");
        $stmt->bindValue(':articleId', $articleId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteComment(int $commentId, int $userId): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM `comments` WHERE `id` = :commentId AND `user_id` = :userId");
        $stmt->bindValue(':commentId', $commentId, PDO::PARAM_INT);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
