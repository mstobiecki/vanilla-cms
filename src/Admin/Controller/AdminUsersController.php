<?php

declare(strict_types=1);

namespace App\Admin\Controller;

use App\Admin\Controller\AdminAbstractController;
use App\Repository\UsersListRepository;

class AdminUsersController extends AdminAbstractController
{
    public function __construct(private UsersListRepository $usersListRepository)
    {
    }

    public function showUsers(): void
    {
        $fetchUsers = $this->usersListRepository->fetchPage();

        $this->render('pages/users', []);
    }
}
