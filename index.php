<?php

require __DIR__ . '/inc/all.inc.php';

$route = (string) ($_GET['route'] ?? 'pages');

switch ($route) {

    case 'pages':
        $page = (string) ($_GET['page'] ?? 'index');

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $pagesController = new \App\Frontend\Controller\PagesController($articlesRepository);

        $pagesController->showIndexPage();
        break;

    case 'article':
        $slug = (string) ($_GET['slug'] ?? '');

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $articlesController = new \App\Frontend\Controller\ArticlesController($articlesRepository);

        $articlesController->showSingleArticle(slug: $slug);
        break;

    case 'admin/index':

        $adminPagesController = new \App\Admin\Controller\AdminPagesController();
        $adminPagesController->showIndexPage();

        break;

    default:
        $notFoundController = new \App\Frontend\Controller\NotFoundController();
        $notFoundController->error404();
}
