<?php
namespace App\Controllers\Pages;

use App\Models\Post;
use App\Services\UsersManager;
use App\View\View;
use JetBrains\PhpStorm\Pure;

class HomeController
{
    #[Pure] public function index():object
    {
        $start = UsersManager::pagination(4);
        return new View('templates/homepage', [
            'posts' => Post::skip($start)->take(4)->orderByDesc('created_at')->get()
        ]);
    }
}
