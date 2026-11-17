<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\UsersRepository;

class AuthService
{
    public function __construct(private UsersRepository $usersRepository)
    {
    }

    private function checkAddressEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Podaj prawidłowy adres e-mail.');
        }
    }

    private function checkPasswordLength(string $password): void
    {
        if (mb_strlen($password) < 8) {
            throw new \InvalidArgumentException('Hasło musi się składać z minimum 8 znaków.');
        }
    }

    private function checkPasswords(string $password, string $passwordRepeat): void
    {
        if ($password !== $passwordRepeat) {
            throw new \InvalidArgumentException('Wprowadzone hasła nie są takie same.');
        }
    }

    public function registerAccount(string $email, string $username, string $password, string $passwordRepeat)
    {
        $this->checkAddressEmail(email: $email);

        if (mb_strlen($username) < 3) {
            throw new \InvalidArgumentException('Nazwa użytkownika musi posiadać minimum 3 znaki.');
        }

        $this->checkPasswordLength(password: $password);

        $this->checkPasswords(password: $password, passwordRepeat: $passwordRepeat);

        if ($this->usersRepository->emailExists(email: $email)) {
            throw new \InvalidArgumentException('Konto z takim adresem e-mail już istnieje.');
        }

        return $this->usersRepository->createAccount(email: $email, username: $username, passwordHash: password_hash($password, PASSWORD_DEFAULT));
    }

    public function loginAccount(string $email, string $password)
    {
        $this->checkAddressEmail($email);

        if ($password === '') {
            throw new \InvalidArgumentException('Wprowadź swoje hasło.');
        }

        $userAccount = $this->usersRepository->findUserByEmail(email: $email);

        if ($userAccount === null) {
            password_hash($password, PASSWORD_DEFAULT);
            throw new \InvalidArgumentException('Nieprawidłowy adres e-mail lub hasło.');
        }

        ['id' => $id, 'password_hash' => $passwordHash] = $userAccount;


        if (!password_verify($password, $passwordHash)) {
            throw new \InvalidArgumentException('Nieprawidłowy adres e-mail lub hasło.');
        }

        session_regenerate_id(true);
        $_SESSION['userId'] = (int) $id;

    }

    public function getCurrentUser(): ?array
    {
        $id = (int) ($_SESSION['userId'] ?? 0);

        if ($id <= 0) {
            return null;
        }

        $user = $this->usersRepository->findUserById($id);

        if ($user === null) {
            $this->logoutAccount();
        }

        return $user;
    }

    public function logoutAccount()
    {
        unset($_SESSION['userId']);
        session_regenerate_id(true);

        header('Location: index.php?' . http_build_query(['route' => 'account/login']));
        exit;
    }

    public function updateAccount(int $userId, string $username, string $email, string $password): array
    {
        $user = $this->usersRepository->findUserProfileById(userId:$userId);

        if ($user === null) {
            $this->logoutAccount();
        }

        if (mb_strlen($username) < 3) {
            throw new \InvalidArgumentException('Nazwa użytkownika nie może być krótsza jak 3 litery.');
        }

        $this->checkAddressEmail($email);
        $this->checkPasswordLength($password);

        $isValidatePassword = password_verify($password, $user['password_hash']);

        if (!$isValidatePassword) {
            throw new \InvalidArgumentException('Wprowadzone hasło do konta jest nieprawidłowe.');
        }

        $isUsernameExist = $this->usersRepository->usernameExists(username: $username);

        return $user;
    }

    public function changePasswordAccount(int $userId, string $currentPassword, string $newPassword, string $passwordRepeat): void
    {
        $passwordHash = $this->usersRepository->findPasswordHashById($userId);

        if ($passwordHash === null || !password_verify($currentPassword, $passwordHash)) {
            throw new \InvalidArgumentException('Obecne hasło jest nieprawidłowe.');
        }

        $this->checkPasswordLength($newPassword);
        $this->checkPasswords($newPassword, $passwordRepeat);

        $this->usersRepository->updatePasswordAccount(userId: $userId, passwordHash: password_hash($newPassword, PASSWORD_DEFAULT));

        session_regenerate_id(true);
    }
}
