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
        $stmt = $this->pdo->prepare("SELECT * FROM `articles` ORDER BY `id` DESC");
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

    public function checkSlugExists(string $slug): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as `count` FROM `articles` WHERE `slug` = :slug");
        $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['count'] >= 1 ? true : false;
    }

    public function addNewArticle(array $articleData)
    {
        if (trim($articleData['title']) === '') {
            throw new \InvalidArgumentException('Tytuł nie może być pusty.');
        }

        if (trim($articleData['content']) === '') {
            throw new \InvalidArgumentException('Treść nie może być pusta.');
        }

        $stmt = $this->pdo->prepare("INSERT INTO `articles` (`title`, `slug`, `image`, `content`, `author`, `reading_time`) VALUES (:title, :slug, :image, :content, :author, :readingTime)");
        $stmt->bindValue(':title', $articleData['title'], PDO::PARAM_STR);
        $stmt->bindValue(':slug', $articleData['slug'], PDO::PARAM_STR);
        $stmt->bindValue(':image', $articleData['image'], PDO::PARAM_STR);
        $stmt->bindValue(':content', $articleData['content'], PDO::PARAM_STR);
        $stmt->bindValue(':author', $articleData['author'], PDO::PARAM_STR);
        $stmt->bindValue(':readingTime', $articleData['readingTime'], PDO::PARAM_INT);
        $stmt->execute();
    }
}
