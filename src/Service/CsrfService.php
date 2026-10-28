<?php

namespace App\Service;

class CsrfService
{
    private const SESSION_KEY = 'csrf_token';

    public function getToken(): string
    {
        if (empty($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = bin2hex(random_bytes(32));
        }

        return $_SESSION[self::SESSION_KEY];
    }

    public function isValid(string $token): bool
    {
        $sessionToken = $_SESSION[self::SESSION_KEY] ?? '';
        return $sessionToken !== '' && hash_equals($sessionToken, $token);
    }
}
