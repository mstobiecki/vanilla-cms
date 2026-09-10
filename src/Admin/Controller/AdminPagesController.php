<?php

namespace App\Admin\Controller;

class AdminPagesController extends AdminAbstractController
{
    public function showIndexPage()
    {
        $this->render('pages/index', []);
    }
}
