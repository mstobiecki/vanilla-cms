<?php

namespace App\Model;

class ArticleModel
{
    public function __construct(
        public int $id,
        public string $title,
        public string $slug,
        public string $image,
        public string $content,
        public string $createAt,
        public string $author,
        public int $readingTime,
    ) {
    }
}
