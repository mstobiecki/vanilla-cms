<?php

require __DIR__ . '/inc/all.inc.php';

session_start();

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

    case 'account/register':
        $usersRepository = new \App\Repository\UsersRepository($pdo);
        $authService = new \App\Service\AuthService($usersRepository);
        $flashMessages = new \App\Service\FlashMessages();

        $usersController = new \App\Frontend\Controller\UsersController($authService, $flashMessages);
        $usersController->registerAccount();

        break;

    case 'account/login':
        $usersRepository = new \App\Repository\UsersRepository($pdo);
        $authService = new \App\Service\AuthService($usersRepository);
        $flashMessages = new \App\Service\FlashMessages();

        $usersController = new \App\Frontend\Controller\UsersController($authService, $flashMessages);
        $usersController->loginAccount();

        break;

    case 'admin/index':

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $imageUploader = new App\Service\ImageUploader();
        $flashMessages = new App\Service\FlashMessages();

        $adminPagesController = new \App\Admin\Controller\AdminPagesController($articlesRepository, $imageUploader, $flashMessages);
        $adminPagesController->showIndexPage();

        break;

    case 'admin/articles/create':

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $imageUploader = new App\Service\ImageUploader();
        $flashMessages = new App\Service\FlashMessages();

        $adminPagesController = new \App\Admin\Controller\AdminPagesController($articlesRepository, $imageUploader, $flashMessages);
        $adminPagesController->createArticle();

        break;
    case 'admin/articles/delete':

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $imageUploader = new App\Service\ImageUploader();
        $flashMessages = new App\Service\FlashMessages();

        $adminPagesController = new \App\Admin\Controller\AdminPagesController($articlesRepository, $imageUploader, $flashMessages);
        $adminPagesController->deleteArticle();

        break;

    case 'admin/articles/list':

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $imageUploader = new App\Service\ImageUploader();
        $flashMessages = new App\Service\FlashMessages();

        $adminPagesController = new \App\Admin\Controller\AdminPagesController($articlesRepository, $imageUploader, $flashMessages);
        $adminPagesController->showAllArticles();

        break;

    case 'admin/articles/edit':

        $articlesRepository = new \App\Repository\ArticlesRepository($pdo);
        $imageUploader = new App\Service\ImageUploader();
        $flashMessages = new App\Service\FlashMessages();

        $adminPagesController = new \App\Admin\Controller\AdminPagesController($articlesRepository, $imageUploader, $flashMessages);
        $adminPagesController->editArticle();

        break;

    default:
        $notFoundController = new \App\Frontend\Controller\NotFoundController();
        $notFoundController->error404();
}
