<?php

namespace App\Frontend\Controller;

class UsersController extends AbstractController
{
    public function registerAccount()
    {
        $this->render("pages/register", []);
    }
}
