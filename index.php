<?php

declare(strict_types=1);

use App\Admin\Controller\AdminPagesController;
use App\Admin\Controller\AdminUsersController;
use App\Frontend\Controller\ArticlesController;
use App\Frontend\Controller\CommentsController;
use App\Frontend\Controller\NotFoundController;
use App\Frontend\Controller\PagesController;
use App\Frontend\Controller\ProfileController;
use App\Frontend\Controller\UsersController;
use App\Repository\ArticlesRepository;
use App\Repository\CommentsRepository;
use App\Repository\UsersRepository;
use App\Repository\UsersListRepository;
use App\Service\AuthService;
use App\Service\CsrfService;
use App\Service\FlashMessages;
use App\Service\ImageUploader;

require __DIR__ . '/inc/all.inc.php';

$usersRepository = new UsersRepository($pdo);
$articlesRepository = new ArticlesRepository($pdo);
$commentsRepository = new CommentsRepository($pdo);
$usersListRepository = new UsersListRepository($pdo);

$authService = new AuthService($usersRepository);
$csrfService = new CsrfService();
$flashMessages = new FlashMessages();
$imageUploader = new ImageUploader();

$pagesController = new PagesController($articlesRepository, $authService);
$articlesController = new ArticlesController($articlesRepository, $commentsRepository, $authService);
$commentsController = new CommentsController($authService, $commentsRepository, $flashMessages);
$usersController = new UsersController($authService, $flashMessages);
$profileController = new ProfileController($authService, $flashMessages);
$adminPagesController = new AdminPagesController($articlesRepository, $imageUploader, $flashMessages);
$adminUsersController = new AdminUsersController($usersListRepository);
$notFoundController = new NotFoundController($authService);

$route = (string) ($_GET['route'] ?? 'pages');

if (str_starts_with($route, 'admin/')) {
    $currentUser = $authService->getCurrentUser();

    if ($currentUser === null) {
        header('Location: index.php?' . http_build_query(['route' => 'account/login']));
        exit;
    }

    if ($currentUser['role'] !== 'admin') {
        header('Location: index.php');
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$csrfService->isValid((string) ($_POST['csrf_token'] ?? ''))) {
    http_response_code(403);
    exit('Nieprawidłowy lub wygasły token formularza. Odśwież stronę i spróbuj ponownie.');
}

switch ($route) {

    case 'pages':
        $pagesController->showIndexPage();
        break;

    case 'article':
        $articlesController->showSingleArticle(slug: (string) ($_GET['slug'] ?? ''));
        break;

    case 'comments/delete':
        $commentsController->deleteComment();
        break;

    case 'account/register':
        $usersController->registerAccount();
        break;

    case 'account/login':
        $usersController->loginAccount();
        break;

    case 'account/logout':
        $authService->logoutAccount();
        break;

    case 'account/profile':
        $profileController->showProfile();
        break;

    case 'account/profile/password':
        $profileController->changePassword();
        break;

    case 'account/profile/update':
        $profileController->updateAccount();
        break;

    case 'admin/index':
        $adminPagesController->showIndexPage();
        break;

    case 'admin/articles/list':
        $adminPagesController->showAllArticles();
        break;

    case 'admin/articles/create':
        $adminPagesController->createArticle();
        break;

    case 'admin/articles/edit':
        $adminPagesController->editArticle();
        break;

    case 'admin/articles/delete':
        $adminPagesController->deleteArticle();
        break;

    case 'admin/users/list':
        $adminUsersController->showUsers();

        break;
    default:
        $notFoundController->error404();
}
