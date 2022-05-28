<?php

namespace App\Controllers\Pages;

use App\Exception\NoRootsException;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Services\UsersManager;
use App\View\View;

class AdminController
{
    /**
     * @throws NoRootsException
     */
    public static function main(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        $kol = $_SESSION['kol'] ?? KOL;

        return new View('templates/admin/main', [
            'title' => 'Admin!',
            'kol' => $kol
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function postsPagination(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        $kol = $_SESSION['kol'] ?? KOL;

        $start = UsersManager::pagination($kol);

        return new View('templates/admin/moderation/posts', [
            'posts' => Post::skip($start)->take($kol)->orderByDesc('created_at')->get(),
            'countAllPosts' => count(Post::all()),
            'kol' => $kol
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function sendForm(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        return new View('templates/admin/sendForm', [
            'title' => 'sendForm!'
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function subscribes(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        return new View('templates/admin/moderation/subscribes', [
            'title' => 'Moderate subscribes!'
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function users(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3 || $_SESSION['role'] == 2)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        return new View('templates/admin/moderation/users', [
            'users' => User::all(),
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function comments(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        return new View('templates/admin/moderation/comments', [
            'comments' => Comment::where('allow', 0)->get()
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function staticPages(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3 || $_SESSION['role'] == 2)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        return new View('templates/admin/moderation/staticPages', [
            'title' => 'Moderate static pages!'
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function addStaticPage(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3 || $_SESSION['role'] == 2)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        return new View('templates/admin/moderation/addStaticPage', [
            'title' => 'Add static page!'
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function changePost(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }
        return new View('templates/admin/moderation/changePost', [
            'title' => 'Changing post!'
        ]);
    }

    /**
     * @throws NoRootsException
     */
    public static function addPost(): View
    {
        if ((!isset($_SESSION['authorization'])) || ($_SESSION['role'] == 3)) {
            throw new NoRootsException('You have no roots for this page', 423);
        }

        return new View('templates/admin/moderation/addPost', [
            'title' => 'Add post!'
        ]);
    }
}
