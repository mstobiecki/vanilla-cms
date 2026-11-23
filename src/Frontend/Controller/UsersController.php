<?php

declare(strict_types=1);

namespace App\Frontend\Controller;

use App\Service\AuthService;
use App\Service\FlashMessages;

class UsersController extends AbstractController
{
    public function __construct(
        AuthService $authService,
        private FlashMessages $flashMessages
    ) {
        parent::__construct($authService);
    }

    private function redirectUserLogin(): void
    {
        if ($this->authService->getCurrentUser()) {
            header('Location: index.php');
            exit;
        }
    }

    public function registerAccount()
    {
        $this->redirectUserLogin();

        $errors = [];
        $email = '';
        $username = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim((string) ($_POST['email'] ?? ''));
            $username = trim((string) ($_POST['username'] ?? ''));
            $password = (string) ($_POST['password'] ?? '');
            $passwordRepeat = (string) ($_POST['passwordRepeat'] ?? '');

            try {
                $this->authService->registerAccount(email: $email, username: $username, password: $password, passwordRepeat: $passwordRepeat);
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
            'username' => $username,
        ]);
    }

    public function loginAccount()
    {

        $this->redirectUserLogin();

        $errors = [];
        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim((string) ($_POST['email']));
            $password = (string) ($_POST['password']);

            try {
                $this->authService->loginAccount(email: $email, password: $password);
                $this->flashMessages->add('success', 'Pomyślne zalogowanie na konto.');

                header("Location: index.php?" . http_build_query(['route' => 'admin/index']));
                exit;

            } catch (\InvalidArgumentException $e) {
                $errors[] = $e->getMessage();
            }
        }
        $this->render('pages/login', [
            'email' => $email,
            'errors' => $errors,
        ]);
    }
}
