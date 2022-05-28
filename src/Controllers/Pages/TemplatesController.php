<?php

namespace App\Controllers\Pages;

use App\Exception\NoRootsException;
use App\Exception\NotFoundException;
use App\Models\Post;
use App\Models\User;
use App\Services\UsersManager;
use App\View\View;
use JetBrains\PhpStorm\Pure;

class TemplatesController
{
    #[Pure] public function authorization():object
    {
        return new View('templates/authorization', ['title' => 'Authorization']);
    }

    #[Pure] public function registration():object
    {
        return new View('templates/registration', ['title' => 'Registration']);
    }

    #[Pure] public function exit(): View
    {
        return new View('templates/exit', ['title' => 'Exit page']);
    }

    #[Pure] public function post():object
    {
        $postId = substr($_SERVER['REQUEST_URI'], 6);

        $post = Post::find($postId);

        if ($post == null) {
            throw new NotFoundException();
        }

        $photo = '/img/posts/post-' . $post->id . '.jpg';
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
            $photo = '/img/posts/post.jpg';
        }

        return new View('templates/post', [
            'post' => $post,
            'photo' => $photo
        ]);
    }

    #[Pure] public function profile():object
    {
        // Создаём ссылку на профиль
        $arr = explode('/', $_SERVER['REQUEST_URI']);
        $profile_link = $arr[2];

        // Находим пользователя в БД
        $user =  User::all()->where('profile_link', '=', $profile_link);
        foreach ($user as $value) {
            $user = $value;
        }

        // Проверяем существование пользователя и авторизацию
        if (empty($user->toArray()) || !isset($_SESSION['authorization'])) {
            throw new NoRootsException('You have no roots for this page!');
        }

        // Проверяем фото профиля
        $photo = '/img/avatars/user-' . $user['id'] . '.jpg';
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
            $photo = '/img/avatars/avatar.jpg';
        }

        $subscribes = User::where('profile_link', $profile_link)->first()->subscribers; // Интерфейс для сервиса подписок

        $isSubscribed = false;
        foreach ($subscribes as $subscribe) {
            if ((($_SESSION['profile_link']) != $profile_link) && ($subscribe['profile_link'] == $_SESSION['profile_link'])) {
                $isSubscribed = true;
            }
        }

        return new View('templates/profile', [
            'user' => $user,
            'comments' => User::where('profile_link', $profile_link)->first()->comments->toArray(),
            'isSubscribed' => $isSubscribed,
            'photo' => $photo
        ]);
    }

    public function subscribes():object
    {
        if (!isset($_SESSION['authorization'], $_COOKIE['authorization'])) {
            throw new NoRootsException('You have no roots for this page!');
        }

        return new View('templates/subscribes', [
            'profiles' => User::where('id', $_SESSION['userId'])->first()->subscribes
        ]);
    }

    #[Pure] public function changeProfile():object
    {
        return new View('templates/changeProfile', ['title' => 'Change profile']);
    }

    public function postsPagination() : object
    {
        $kol = $_SESSION['kol'] ?? KOL;

        $start = UsersManager::pagination($kol);

        return new View('templates/posts', [
            'posts' => Post::skip($start)->take($kol)->orderByDesc('created_at')->get(),
            'kol' => $kol
        ]);
    }
    #[Pure] public function sendForm()
    {
        return new View('templates/sendForm', ['title' => 'sendForm']);
    }
}
