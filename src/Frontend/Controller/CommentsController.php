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

    }
}
