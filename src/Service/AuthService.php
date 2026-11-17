<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\UsersRepository;

class AuthService
{
    public function __construct(private UsersRepository $usersRepository)
    {
    }

    private function validateAddressEmail(string $email)
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

    private function checkUsernameLength(string $username): void
    {
        if (mb_strlen($username) < 3) {
            throw new \InvalidArgumentException('Nazwa użytkownika musi posiadać minimum 3 znaki.');
        }
    }

    private function checkPasswords(string $password, string $passwordRepeat): void
    {
        if ($password !== $passwordRepeat) {
            throw new \InvalidArgumentException('Wprowadzone hasła nie są takie same.');
        }
    }

    private function checkEmailExists(string $email): void
    {
        if ($this->usersRepository->emailExists(email: $email)) {
            throw new \InvalidArgumentException('Konto z takim adresem e-mail już istnieje.');
        }
    }

    private function checkUsernameExists(string $username): void
    {
        if ($this->usersRepository->usernameExists(username: $username)) {
            throw new \InvalidArgumentException('Wprowadzana nazwa użytkownika jest już zajęta.');
        }

    }

    public function registerAccount(string $email, string $username, string $password, string $passwordRepeat)
    {
        $this->validateAddressEmail(email: $email);

        $this->checkUsernameLength($username);

        $this->checkPasswordLength(password: $password);

        $this->checkPasswords(password: $password, passwordRepeat: $passwordRepeat);

        $this->checkUsernameExists(username:$username);

        $this->checkEmailExists(email: $email);

        return $this->usersRepository->createAccount(email: $email, username: $username, passwordHash: password_hash($password, PASSWORD_DEFAULT));
    }

    public function loginAccount(string $email, string $password)
    {
        $this->validateAddressEmail($email);

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

    public function getProfileUser(): ?array
    {
        $userId = (int) ($_SESSION['userId'] ?? 0);

        if ($userId <= 0) {
            return null;
        }

        $userProfile = $this->usersRepository->fetchUserProfile(userId: (int) $userId);

        return $userProfile;

    }

    public function logoutAccount()
    {
        unset($_SESSION['userId']);
        session_regenerate_id(true);

        header('Location: index.php?' . http_build_query(['route' => 'account/login']));
        exit;
    }

    public function updateAccount(int $userId, string $username, string $email, string $password): void
    {
        $username = trim($username);
        $email = mb_strtolower(trim($email));

        $user = $this->usersRepository->findUserProfileById(userId: $userId);

        if ($user === null) {
            $this->logoutAccount();
        }

        $this->checkUsernameLength($username);
        $this->validateAddressEmail($email);

        if (!password_verify($password, $user['password_hash'])) {
            throw new \InvalidArgumentException('Wprowadzone hasło do konta jest nieprawidłowe.');
        }

        if ($this->usersRepository->usernameExistsForOtherUser($userId, $username)) {
            throw new \InvalidArgumentException('Wprowadzana nazwa użytkownika jest już zajęta.');
        }

        if ($this->usersRepository->emailExistsForOtherUser($userId, $email)) {
            throw new \InvalidArgumentException('Konto z takim adresem e-mail już istnieje.');
        }

        try {
            $this->usersRepository->updateProfile($userId, $username, $email);
        } catch (\PDOException $e) {
            if ($e->getCode() === '23000') {
                throw new \InvalidArgumentException('Nazwa użytkownika lub adres e-mail jest już zajęty.');
            }
            throw $e;
        }
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
