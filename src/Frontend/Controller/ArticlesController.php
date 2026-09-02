<?php

namespace App\Frontend\Controller;

use App\Repository\ArticlesRepository;

class ArticlesController extends AbstractController
{
    public function __construct(private ArticlesRepository $articlesRepository)
    {
    }

    public function showArticle(string $slug)
    {
        var_dump('ArticlesController::showArticle');

    }
}
