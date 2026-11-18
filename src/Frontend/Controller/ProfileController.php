<?php

declare(strict_types=1);

namespace App\Frontend\Controller;

use App\Service\AuthService;
use App\Service\FlashMessages;

class ProfileController extends AbstractController
{
    public function __construct(AuthService $authService, private FlashMessages $flashMessages)
    {
        parent::__construct($authService);
    }

    private function redirectToAccountProfile(): never
    {
        header('Location: index.php?' . http_build_query(['route' => 'account/profile']));
        exit;
    }

    private function requireCurrentUser(): array
    {
        $currentUser = $this->authService->getCurrentUser();

        if ($currentUser === null) {
            header('Location: index.php?' . http_build_query(['route' => 'account/login']));
            exit;
        }

        return $currentUser;

    }

    public function showProfile(): void
    {
        if ($this->requireCurrentUser()) {

            $userProfile = $this->authService->getCurrentUser();

            $this->render('pages/profile', [
                'userProfile' => $userProfile,
            ]);
        }
    }

    public function updateAccount()
    {
        $currentUser = $this->requireCurrentUser();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = (string) ($_POST['username'] ?? '');
            $email = (string) ($_POST['email'] ?? '');
            $password = (string) ($_POST['password'] ?? '');

            try {
                $this->authService->updateAccount((int) $currentUser['id'], $username, $email, $password);
                $this->flashMessages->add('success', 'Dane konta zostały zaktualizowane.');
                $this->redirectToAccountProfile();
            } catch (\InvalidArgumentException $e) {
                $this->flashMessages->add('error', $e->getMessage());
                $this->redirectToAccountProfile();
            }
        }
    }

    public function changePassword(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = (string) ($_POST['currentPassword'] ?? '');
            $newPassword = (string) ($_POST['newPassword'] ?? '');
            $passwordRepeat = (string) ($_POST['passwordRepeat'] ?? '');

            $currentUser = $this->requireCurrentUser();

            try {
                $this->authService->changePasswordAccount(userId: (int) $currentUser['id'], currentPassword: $currentPassword, newPassword: $newPassword, passwordRepeat: $passwordRepeat);
                $this->flashMessages->add('success', 'Hasło zostało zmienione prawidłowo.');

                $this->redirectToAccountProfile();
            } catch (\InvalidArgumentException $e) {
                $this->flashMessages->add('error', $e->getMessage());
                $this->redirectToAccountProfile();
            }
        } else {
            header('Location: index.php');
            exit;
        }
    }
}
