<?php

require __DIR__ . '/inc/all.inc.php';

$page = (string) ($_GET['page'] ?? 'index');

switch ($page) {
    case 'index':
        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $pagesController = new \App\Frontend\Controller\PagesController($articlesRepository);
        $pagesController->showIndexPage();
        break;
    case 'article':
        $slug = (string) ($_GET['slug'] ?? '');

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $articlesController = new \App\Frontend\Controller\ArticlesController($articlesRepository);

        $articlesController->showSingleArticle(slug: $slug);
        $articlesController->showAllArticles();

        break;
    default:
        $notFoundController = new \App\Frontend\Controller\NotFoundController();
        $notFoundController->error404();
}
