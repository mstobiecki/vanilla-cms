<?php

declare(strict_types=1);

namespace App\Frontend\Controller;

use App\Repository\ArticlesRepository;
use App\Service\AuthService;

class PagesController extends AbstractController
{
    public function __construct(private ArticlesRepository $articlesRepository, AuthService $authService)
    {
        parent::__construct($authService);
    }

    public function showIndexPage()
    {
        $allArticles = $this->articlesRepository->fetchAllArticles();
        $isEmptyArticles = false;

        if (empty($allArticles)) {
            $isEmptyArticles = true;
        }

        $countArticles = $this->articlesRepository->countAllArticles();

        $this->render('pages/index', [
            'isEmptyArticles' => $isEmptyArticles,
            'allArticles' => $allArticles,
            'countArticles' => $countArticles,
        ]);
    }
}
