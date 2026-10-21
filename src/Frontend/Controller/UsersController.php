<?php

namespace App\Frontend\Controller;

use App\Service\AuthService;

class UsersController extends AbstractController
{
    public function __construct(private AuthService $authService)
    {
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
                $success = $this->authService->registerAccount(email: $email, password: $password, passwordRepeat: $passwordRepeat);
                var_dump($success);
            } catch (\InvalidArgumentException $e) {
                $errors[] = $e->getMessage();
            }
        }
        $this->render("pages/register", [
            'errors' => $errors,
            'email' => $email,
        ]);
    }
}
