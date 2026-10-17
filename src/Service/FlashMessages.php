<?php

namespace App\Service;

class FlashMessages
{
    public function add(string $type, string $message): void
    {
        $_SESSION['flash'][$type][] = $message;
    }
    public function consume(): array
    {
        $messages = $_SESSION['flash'] ?? [];
        unset($_SESSION['flash']);

        return $messages;
    }

}
