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

    private function generateSlug(string $title): string
    {
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
        return trim($slug, '-');
    }

    private function getArticleData(array $existingArticle = []): array
    {
        $title = (string) ($_POST['title'] ?? '');
        $content = (string) ($_POST['content'] ?? '');
        $author = (string) ($_POST['author'] ?? '');
        $readingTime = (int) ($_POST['readingTime'] ?? 1);

        $image = $existingArticle['image'] ?? '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $image = $this->imageUploader->upload($_FILES['image']);
        }

        $errors = [];
        return [
            'title' => $title,
            'slug' => $this->generateSlug(title: $title),
            'content' => $content,
            'image' => $image,
            'author' => $author,
            'readingTime' => $readingTime
        ];

    }

    public function showIndexPage()
    {
        $this->render('pages/index', []);
    }

    public function showAllArticles()
    {
        $allArticlesFromDb = $this->articlesRepository->fetchAllArticles();

        if (empty($allArticlesFromDb)) {
            return;
        }

        $this->render('pages/articles', [
            'allArticlesFromDb' => $allArticlesFromDb,
        ]);
    }

    public function createArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleData = $this->getArticleData();

            try {
                $isSlugExists = $this->articlesRepository->checkSlugExists(slug: $articleData['slug']);

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

    public function editArticle()
    {
        $id = (int) ($_GET['id'] ?? 0);
        $errors = [];

        $singleArticle = $this->articlesRepository->fetchSingleArticleById(id: $id);

        if ($singleArticle === null) {
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $articleData = $this->getArticleData([
                'image' => $singleArticle->image,
            ]);

            try {
                $isSlugExists = $this->articlesRepository->checkSlugExistsForOtherArticle(id: $id, slug: $articleData['slug']);


                if ($isSlugExists) {
                    $errors[] = 'W bazie danych istnieje artykuł o takim tytule. Spróbuj zmienić tytuł na inny.';
                }

                $this->articlesRepository->updateArticle(id: $id, articleData: $articleData);

                header("Location: index.php?" . http_build_query(['route' => 'admin/index']));
                exit;

            } catch (\InvalidArgumentException | \RuntimeException $e) {
                $errors[] = $e->getMessage();
            }
        }

        $this->render('pages/edit-article', [
            'singleArticle' => $singleArticle,
            'errors' => $errors,
        ]);
    }
}
