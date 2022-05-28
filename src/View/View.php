<?php

namespace App\View;

use App\Exception\NotFoundException;

class View implements Renderable
{
    private string $view;
    private array $data;
    public function __construct($view, $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function render()
    {
        extract($this->data, EXTR_PREFIX_SAME, "wddx");
        if (isset($this->data['errorCode'])) {
            $errorCode = $this->data['errorCode'];
            $errorMessage = $this->data['errorMessage'];
            http_response_code($errorCode);
        }

        include VIEW_DIR . '/Layout/header.php';
        $success = include $this->getIncludeTemplate($this->view);
        if ($success !== 1) {
            $errorMessage = 'The template ' . $this->view . ' was not found';
            (new NotFoundException($errorMessage, 404))->render();
        }
        include VIEW_DIR . '/Layout/footer.php';
    }

    public function getIncludeTemplate($view):string
    {
        $view = str_replace('.', '/', $view);
        return APP_DIR  . '/' . $view . '.php';
    }
}
