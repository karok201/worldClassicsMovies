<?php

namespace App\Controllers;

use App\Controllers\AbstractClasses\AbstractController;
use App\Controllers\Networking\SendMessage;
use App\Models\Comment;
use App\Models\Post;
use JetBrains\PhpStorm\NoReturn;
use Tamtamchik\SimpleFlash\Flash;

class PostsController extends AbstractController
{
    #[NoReturn] public function addPost()
    {
        $flash = new Flash();
        $title = $_POST['title'];
        $description = $_POST['description'];

        $post = Post::create(['user_id' => $_SESSION['userId'], 'title' => $title, 'description' => $description]);
        $arr = $post->toArray();
        $maxId = $arr['id'];

        if ($_FILES['post']['size'] < 2097152) {
            loadPhoto('post', $maxId);
        } else {
            $flash->error('Add correct photo');

            setcookie('title', $title, time() + 3600);
            setcookie('description', $description, time() + 3600);

            $this->redirectTo('/admin/moderation/addPost');
        }

        SendMessage::sendEmail($title, $description, $maxId);

        setcookie('title', $title, time() - 14800);
        setcookie('description', $description, time() - 14800);

        $flash->success('Post successfully added!');

        $this->redirectTo('/admin/moderation/posts/1');
    }

    #[NoReturn] public function changePost()
    {
        $flash = new Flash();
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        if ($_FILES['post']['size'] < 2097152) {
            loadPhoto('post', $id);
        } else {
            $flash->error('Add correct photo');

            $this->redirectTo('/admin/moderation/addPost');
        }

        Post::where('id', $id)->update(['title' => $title, 'description' => $description]);

        $flash->success('Post successfully changed!');

        $this->redirectTo('/admin/moderation/posts/1');
    }

    #[NoReturn] public function deletePost()
    {
        $id = $_POST['postId'];

        Comment::where('post_id', $id)->delete();
        Post::where('id', $id)->delete();
        $link = $_SERVER['DOCUMENT_ROOT'] . '/img/posts/post-' . $id . '.jpg';
        unlink($link);

        Flash::warning('Post successfully deleted');
        $this->redirectTo('/admin/moderation/posts/1');
    }

    #[NoReturn] public function changeQuantity($kol)
    {
        $_SESSION['kol'] = $kol;

        Flash::success('Quantity successfully changed!');

        $this->redirectTo('/admin/main');
    }
}
