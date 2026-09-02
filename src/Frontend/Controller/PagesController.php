<?php

namespace App\Frontend\Controller;

class PagesController extends AbstractController
{
    public function showPage(string $slug)
    {
        $this->render('pages/index', []);
    }
}
