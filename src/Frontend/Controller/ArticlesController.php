<?php

namespace App\Frontend\Controller;

use App\Repository\ArticlesRepository;

class ArticlesController extends AbstractController
{
    public function __construct(private ArticlesRepository $articlesRepository)
    {
    }

    public function showSingleArticle(string $slug)
    {
        $singleArticle = $this->articlesRepository->showSingleArticle(slug: $slug);

        if (empty($singleArticle)) {
            $this->error404();
        }

        $this->render('pages/article', []);

    }
}
