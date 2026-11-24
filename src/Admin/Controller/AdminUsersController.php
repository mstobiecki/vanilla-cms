<?php

declare(strict_types=1);

namespace App\Admin\Controller;

use App\Admin\Controller\AdminAbstractController;

class AdminUsersController extends AdminAbstractController
{
    public function showUsers(): void
    {
        $this->render('pages/users', []);
    }
}
