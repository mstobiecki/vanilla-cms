<?php

namespace App\Admin\Controller;

use App\Repository\ArticlesRepository;
use App\Service\ImageUploader;

class AdminPagesController extends AdminAbstractController
{
    public function __construct(
        private ArticlesRepository $articlesRepository,
        private ImageUploader $imageUploader,
    ) {
    }

    public function showIndexPage()
    {
        $this->render('pages/index', []);
    }

    public function createArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = (string) ($_POST['title'] ?? '');
            $content = (string) ($_POST['content'] ?? '');
            $author = (string) ($_POST['author'] ?? '');
            $readingTime = (int) ($_POST['readingTime'] ?? 1);

            $image = '';

            if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                $image = $this->imageUploader->upload($_FILES['image']);
            }

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

            $errors = [];
            $articleData = [
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'image' => $image,
                'author' => $author,
                'readingTime' => $readingTime
            ];

            try {
                $isSlugExists = $this->articlesRepository->checkSlugExists(slug: $slug);

                if ($isSlugExists) {
                    $errors[] = 'W bazie danych istnieje artykuł o takim tytule. Spróbuj zmienić tytuł na inny.';
                    return;
                }

                $this->articlesRepository->addNewArticle(articleData: $articleData);

                header("Location: index.php?" . http_build_query(['route' => 'admin/index']));
                exit;

            } catch (\InvalidArgumentException | \RuntimeException $e) {
                var_dump($e->getMessage());
            }
        }
        $this->render('pages/create-article', []);
    }
}
