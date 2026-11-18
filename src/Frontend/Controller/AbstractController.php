<?php

declare(strict_types=1);

namespace App\Frontend\Controller;

use App\Service\AuthService;

abstract class AbstractController
{
    public function __construct(protected AuthService $authService)
    {
    }

    protected function render($view, $params)
    {
        $params['flash'] = (new \App\Service\FlashMessages())->consume();
        extract($params);

        ob_start();
        require __DIR__ . '/../../../views/frontend/' . $view . '.view.php';
        $contents = ob_get_clean();

        $currentUser = $this->authService->getCurrentUser();
        require __DIR__ . '/../../../views/frontend/layouts/main.view.php';
    }

    protected function error404()
    {
        http_response_code(404);
        require __DIR__ . '/../../../views/frontend/layouts/error404.view.php';
        exit;
    }
}
