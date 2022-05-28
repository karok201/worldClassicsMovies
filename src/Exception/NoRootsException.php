<?php

namespace App\Exception;

use App\View\Renderable;

class NoRootsException extends HttpException implements Renderable
{
    public function render()
    {
        header('HTTP/1.1 423 Locked');
        include VIEW_DIR . '/Layout/header.php';
        include APP_DIR . '/src/view/errors/error.php';
        include VIEW_DIR . '/Layout/footer.php';
    }
}
