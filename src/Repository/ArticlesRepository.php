<?php

namespace App\Repository;

use PDO;
use App\Model\ArticleModel;

class ArticlesRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    private function arrayToModel(array $entry): ?ArticleModel
    {
        return new ArticleModel(
            id: (int) $entry['id'],
            title: (string) $entry['title'],
            slug: (string) $entry['slug'],
            image: (string) $entry['image'],
            content: (string) $entry['content'],
            createAt: (string) $entry['create_at'],
            author: (string) $entry['author'],
            readingTime: (int) $entry['reading_time'],
        );
    }

    public function showSingleArticle(string $slug): ?ArticleModel
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `articles` WHERE `slug` = :slug");
        $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $entry = $stmt->fetch();

        if (!empty($entry)) {
            return $this->arrayToModel($entry);
        } else {
            return null;
        }
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

        $model = [];
        foreach ($entries as $entry) {
            $model[] = $this->arrayToModel($entry);
        }

        return $model;


    }
}
