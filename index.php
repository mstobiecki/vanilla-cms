<?php

require __DIR__ . '/inc/all.inc.php';

$page = (string) ($_GET['page'] ?? 'index');

switch ($page) {
    case 'index':
        $pagesController = new \App\Frontend\Controller\PagesController();
        $pagesController->showPage('index');
        break;
    case 'article':
        $slug = (string) ($_GET['slug'] ?? '');

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $articlesController = new \App\Frontend\Controller\ArticlesController($articlesRepository);
        $articlesController->showArticle('index');

        break;
    default:
        $notFoundController = new \App\Frontend\Controller\NotFoundController();
        $notFoundController->error404();
}
