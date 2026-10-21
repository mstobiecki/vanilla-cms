<?php

namespace App\Frontend\Controller;

class UsersController extends AbstractController
{
    public function registerAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = (string) ($_POST['email'] ?? '');
            $password = (string) ($_POST['password'] ?? '');
            $passwordRepeat = (string) ($_POST['passwordRepeat'] ?? '');



            $this->render("pages/register", []);
        }
    }
}
