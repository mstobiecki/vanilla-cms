<?php

declare(strict_types=1);

namespace App\Frontend\Controller;

use App\Repository\CommentsRepository;
use App\Service\AuthService;
use App\Service\FlashMessages;

class CommentsController
{
    public function __construct(private AuthService $authService, private CommentsRepository $commentsRepository, private FlashMessages $flashMessages)
    {
    }

    private function redirectToComments(string $articleSlug): never
    {
        header('Location: index.php?' . http_build_query(['route' => 'article', 'slug' => $articleSlug]) . '#comments');
        exit();
    }

    public function deleteComment(): void
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

                $this->flashMessages->add(type: 'error', message: 'Nieprawidłowe wywołanie adresu URL');

                header('Location: index.php');
                exit();

            }

            if ($currentUser['role'] === 'admin') {
                $isDeleted = $this->commentsRepository->deleteCommentAsAdmin($commentId);
            } else {
                $isDeleted = $this->commentsRepository->deleteComment(commentId: $commentId, userId: (int) $currentUser['id']);
            }

            if (!$isDeleted) {
                $this->flashMessages->add(type: 'error', message: 'Nie znaleziono komentarza lub nie masz uprawnień do usuwania.');
            }

            $this->redirectToComments(articleSlug: $articleSlug);
        }

    }
}
