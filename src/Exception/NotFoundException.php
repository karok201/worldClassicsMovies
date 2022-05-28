<?php

namespace App\Exception;

use App\View\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        header('HTTP/1.1 404 Not Found');
        include VIEW_DIR . '/Layout/header.php';
        include APP_DIR . '/src/View/errors/error.php';
        include VIEW_DIR . '/Layout/footer.php';
    }
}
