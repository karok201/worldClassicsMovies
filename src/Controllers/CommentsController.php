<?php

namespace App\Controllers;

use App\Controllers\AbstractClasses\AbstractController;
use App\Models\Comment;
use JetBrains\PhpStorm\NoReturn;
use Tamtamchik\SimpleFlash\Flash;

class CommentsController extends AbstractController
{
    #[NoReturn] public function sendComment()
    {
        $userId = $_POST['userId'] ?? null;
        $postId = $_POST['postId'] ?? null;
        $description = $_POST['description'] ?? null;
        $allow = 0;

        if ($_SESSION['role'] !== 3) {
            $allow = 1;
        }

        Comment::create(['description' => $description, 'post_id' => $postId, 'user_id' => $userId, 'allow' => $allow]);

        Flash::success('Comment added');

        $this->redirect($postId);
    }

    #[NoReturn] public function deleteComment($url)
    {
        $id = $_POST['id'];
        Comment::where('id', $id)->delete();

        Flash::warning('Comment successfully deleted!');
        $this->redirectTo($url);
    }

    #[NoReturn] public function allowComment()
    {
        $id = $_POST['id'];
        Comment::where('id', $id)->update(['allow' => 1]);

        Flash::success('Comment successfully allowed!');
        $this->redirectTo('/admin/moderation/comments');
    }
}
