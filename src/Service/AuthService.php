<?php

namespace App\Service;

use App\Repository\UsersRepository;

class AuthService
{
    public function __construct(private UsersRepository $usersReposistory)
    {
    }

    public function registerAccount(string $email, string $password, string $passwordRepeat)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Podaj prawidłowy adres e-mail.');
        }

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

    }
}
