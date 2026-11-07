<?php

declare(strict_types=1);

namespace App\Frontend\Controller;

class Profile extends AbstractController
{
    public function showProfile(): void
    {
        $this->render('pages/profile', []);
    }
}
