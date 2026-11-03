<?php

namespace App\Frontend\Controller;

use App\Repository\ArticlesRepository;
use App\Repository\CommentsRepository;
use App\Service\AuthService;

class ArticlesController extends AbstractController
{
    public function __construct(private ArticlesRepository $articlesRepository, private CommentsRepository $commentsRepository, private AuthService $authService)
    {
    }

    public function showSingleArticle(string $slug)
    {
        $singleArticle = $this->articlesRepository->showSingleArticle(slug: $slug);

        if (empty($singleArticle)) {
            $this->error404();
            return;
        }

        $currentUser = $this->authService->getCurrentUser();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($currentUser === null) {
                header("Location: index.php?" . http_build_query(['route' => 'account/login']));
                exit;
            }

            $content = trim((string) ($_POST['content'] ?? ''));

            if ($content === '') {
                http_response_code(422);

                $this->render('pages/article', [
                    'singleArticle' => $singleArticle,
                    'comments' => $this->commentsRepository->getCommentByArticleId($singleArticle->id),
                    'currentUser' => $currentUser,
                    'commentError' => 'Komentarz nie może być pusty.',
                    'oldContent' => $content,
                ]);

                return;
            }

            if (mb_strlen($content) > 1000) {
                http_response_code(422);

                $this->render('pages/article', [
                    'singleArticle' => $singleArticle,
                    'comments' => $this->commentsRepository->getCommentByArticleId($singleArticle->id),
                    'currentUser' => $currentUser,
                    'commentError' => 'Komentarz nie może mieć więcej jak 1000 znaków.',
                    'oldContent' => $content,
                ]);

                return;
            }

            $this->commentsRepository->createComment(
                articleId: (int) $singleArticle->id,
                userId: (int) $currentUser['id'],
                content: (string) $content
            );

            $redirectUrl = "index.php?" . http_build_query(['route' => 'article', 'slug' => $slug]) . '#comments';
            header("Location: " . $redirectUrl);
            exit;

        }

        $comments = $this->commentsRepository->getCommentByArticleId(articleId: (int) $singleArticle->id);

        $this->render('pages/article', [
            'singleArticle' => $singleArticle,
            'comments' => $comments,
            'currentUser' => $currentUser,
        ]);

    }
}
