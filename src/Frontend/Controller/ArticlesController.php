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

    private const MAX_COMMENT_LENGTH = 1000;

    private function validateComment(string $content): ?string
    {

        if (trim($content) === '') {
            return 'Komentarz nie może być pusty.';
        }

        if (mb_strlen($content) > self::MAX_COMMENT_LENGTH) {
            return 'Komentarz nie może mieć więcej jak ' . self::MAX_COMMENT_LENGTH . ' znaków.';
        }

        return null;
    }

    public function showSingleArticle(string $slug)
    {
        $singleArticle = $this->articlesRepository->showSingleArticle(slug: $slug);

        if (empty($singleArticle)) {
            $this->error404();
            return;
        }

        $currentUser = $this->authService->getCurrentUser();
        $commentError = '';
        $content = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($currentUser === null) {
                header('Location: index.php?' . http_build_query(['route' => 'account/login']));
                exit;
            }

            $content = trim((string) ($_POST['content'] ?? ''));
            $commentError = $this->validateComment($content);

            if ($commentError === null) {
                $this->commentsRepository->createComment(
                    articleId: (int) $singleArticle->id,
                    userId: (int) $currentUser['id'],
                    content: $content,
                );

                header('Location: index.php?' . http_build_query(['route' => 'article', 'slug' => $slug]) . '#comments');
                exit;
            }

            http_response_code(422);
        }

        $this->render('pages/article', [
            'singleArticle' => $singleArticle,
            'comments' => $this->commentsRepository->getCommentsByArticleId((int) $singleArticle->id),
            'currentUser' => $currentUser,
            'commentError' => $commentError,
            'oldContent' => $content,
        ]);

    }
}
