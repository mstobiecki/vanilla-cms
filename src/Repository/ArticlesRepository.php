<?php

namespace App\Repository;

use PDO;
use App\Model\ArticleModel;

class ArticlesRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function showSingleArticle(string $slug): ?ArticleModel
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `articles` WHERE `slug` = :slug");
        $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, ArticleModel::class);
        $entry = $stmt->fetch();

        if (empty($entry)) {
            return null;
        }

        return $entry;
    }

    public function fetchAllArticles(): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `articles` ORDER BY `id` ASC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, ArticleModel::class);
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($entries)) {
            return null;
        }

        return $entries;
    }
}
