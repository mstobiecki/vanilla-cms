<?php

namespace App\Admin\Controller;

use App\Repository\ArticlesRepository;

class AdminPagesController extends AdminAbstractController
{
    public function __construct(private ArticlesRepository $articlesRepository)
    {
    }

    public function showIndexPage()
    {
        $this->render('pages/index', []);
    }

    public function createArticle()
    {
        if (!empty($_POST)) {
            $title = (string) ($_POST['title'] ?? '');
            $content = (string) ($_POST['content'] ?? '');

            $chars = [
              'ą' => 'a',
              'ć' => 'c',
              'ę' => 'e',
              'ł' => 'l',
              'ń' => 'n',
              'ó' => 'o',
              'ś' => 's',
              'ź' => 'z',
              'ż' => 'z',
            ];

            $slug = strtr(mb_strtolower($title), $chars);
            $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
            $slug = trim($slug, '-');


            try {
                $isSlugExists = $this->articlesRepository->checkSlugExists(slug: $slug);
                // $this->articlesRepository->addNewArticle(title: $title, slug: $slug, content: $content);
            } catch (\InvalidArgumentException $e) {

            }
        }
        $this->render('pages/create-article', []);
    }
}
