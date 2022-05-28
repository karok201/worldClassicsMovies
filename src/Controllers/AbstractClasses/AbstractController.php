<?php
namespace App\Controllers\AbstractClasses;

use JetBrains\PhpStorm\NoReturn;

class AbstractController
{
    #[NoReturn] public function redirect($id)
    {
        header('Location: /post/' . $id);
        die();
    }
    #[NoReturn] public function redirectTo($url)
    {
        header('Location: ' . $url);
        die();
    }
}
