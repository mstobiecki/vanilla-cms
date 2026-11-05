<?php

namespace App\Frontend\Controller;

use App\Repository\CommentsRepository;
use App\Service\AuthService;

class CommentsController
{
    public function __construct(private AuthService $authService, private CommentsRepository $commentsRepository)
    {
    }

    public function deleteComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentId = (int) ($_POST['commentId'] ?? 0);
            $articleSlug = (string) ($_POST['articleSlug'] ?? '');

            $currentUser = $this->authService->getCurrentUser();

            if ($currentUser === null) {
                header('Location: index.php?' . http_build_query(['route' => 'account/login']));
                exit;
            }

            if ($commentId <= 0 || trim($articleSlug) === '') {
                http_response_code(400);
                exit('Nieprawidłowe wywołanie adresu URL.');
            }

            $deletedComment = $this->commentsRepository->deleteComment(commentId: $commentId, userId: $currentUser['id']);

            if (!$deletedComment) {
                http_response_code(404);
                exit('Nie znaleziono komentarza lub nie masz uprawnień do jego usunięcia.');
            }

            header('Location: index.php?' . http_build_query(['route' => 'article', 'slug' => $articleSlug]) . '#comments');
            exit();
        }

    }
}
