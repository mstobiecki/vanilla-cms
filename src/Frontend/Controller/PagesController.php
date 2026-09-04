<?php

namespace App\Frontend\Controller;

use App\Repository\ArticlesRepository;

class PagesController extends AbstractController
{
    public function __construct(private ArticlesRepository $articlesRepository)
    {
    }

    public function showIndexPage()
    {
        $allArticles = $this->articlesRepository->fetchAllArticles();
        $isEmptyArticles = false;

        if (empty($allArticles)) {
            $isEmptyArticles = true;
        }

        $this->render('pages/index', [
            'isEmptyArticles' => $isEmptyArticles,
            'allArticles' => $allArticles
        ]);
    }
}
