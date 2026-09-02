<?php

require __DIR__ . '/inc/all.inc.php';

$page = (string) ($_GET['page'] ?? 'index');

switch ($page) {
    case 'index':
        $pagesController = new \App\Frontend\Controller\PagesController();
        $pagesController->showPage('index');
        break;
    default:
        echo 'error404';
}
