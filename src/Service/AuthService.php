<?php

namespace App\Service;

use App\Repository\UsersRepository;

class AuthService
{
    public function __construct(private UsersRepository $usersReposistory)
    {
    }

    private function checkAddressEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Podaj prawidłowy adres e-mail.');
        }
    }

    public function registerAccount(string $email, string $password, string $passwordRepeat)
    {
        $this->checkAddressEmail($email);

        if (mb_strlen($password) < 8) {
            throw new \InvalidArgumentException('Hasło musi się składać z minumum 8 znaków.');
        }

        if ($password !== $passwordRepeat) {
            throw new \InvalidArgumentException('Wprowadzone hasła nie są takie same.');
        }

        if ($this->usersReposistory->emailExists(email: $email)) {
            throw new \InvalidArgumentException('Konto z takim adresem e-mail już istnieje.');
        }

        return $this->usersReposistory->createAccount(email: $email, passwordHash: password_hash($password, PASSWORD_DEFAULT));
    }

    public function loginAccount(string $email, string $password)
    {
        $this->checkAddressEmail($email);

        if ($password === '') {
            throw new \InvalidArgumentException('Wprowadź swoje hasło.');
        }

        $userAccount = $this->usersReposistory->findUserByEmail(email: $email);
        ['id' => $id, 'password_hash' => $passwordHash] = $userAccount;

        if ($userAccount === null) {
            password_hash($password, PASSWORD_DEFAULT);
            throw new \InvalidArgumentException('Nieprawidłowy adres e-mail lub hasło.');
        }


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

        $user = $this->usersReposistory->findUserById($id);

        if ($user === null) {
            $this->logoutAccount();
        }

        return $user;
    }

    public function logoutAccount()
    {
        unset($_SESSION['userId']);
        session_regenerate_id(true);
    }
}
