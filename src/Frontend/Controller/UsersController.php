<?php

namespace App\Frontend\Controller;

use App\Service\AuthService;
use App\Service\FlashMessages;

class UsersController extends AbstractController
{
    public function __construct(
        private AuthService $authService,
        private FlashMessages $flashMessages
    ) {
    }

    public function registerAccount()
    {
        $errors = [];
        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim((string) ($_POST['email'] ?? ''));
            $password = (string) ($_POST['password'] ?? '');
            $passwordRepeat = (string) ($_POST['passwordRepeat'] ?? '');

            try {
                $this->authService->registerAccount(email: $email, password: $password, passwordRepeat: $passwordRepeat);
                $this->flashMessages->add('success', 'Konto zostało utworzone.');

                header("Location: index.php?" . http_build_query(['route' => 'account/login']));
                exit;

            } catch (\InvalidArgumentException $e) {
                $errors[] = $e->getMessage();
            }
        }
        $this->render("pages/register", [
            'errors' => $errors,
            'email' => $email,
        ]);
    }

    public function loginAccount()
    {
        echo "UsersController::loginAccount()";
    }
}
