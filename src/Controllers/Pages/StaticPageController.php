<?php
namespace App\Controllers\Pages;

use App\Controllers\AbstractClasses\AbstractController;
use App\View\View;
use Tamtamchik\SimpleFlash\Flash;

class StaticPageController extends AbstractController
{
    public static function staticPage()
    {
        $arr = explode('/', $_SERVER['REQUEST_URI']);
        $currentPage = $arr[1];

        return new View('/templates/staticPages/' . $currentPage, ['title' => 'Das alte leid']);

    }
    public function createPage()
    {
        $link = $_POST['link'] ?? null;
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;

        if (!$link || !$title || !$description) {
            Flash::error('Data is not filled in enough');

            $this->redirectTo('/admin/moderation/staticPages');
        }

        if (ctype_alpha($link) !== true) {
            Flash::error('Error link format');

            $this->redirectTo('/admin/moderation/staticPages');
        }

        $link = $_SERVER['DOCUMENT_ROOT'] . '/templates/staticPages/' . strtolower($link) . '.php';
        $file = fopen( $link, 'w');

        fwrite($file ,'<div class="container"><h1 class="display-6">' . $title . '</h1><p>' . $description . '</p></div>');

        fclose($file);


        Flash::success('File successfully added!');

        $this->redirectTo('/admin/moderation/staticPages');
    }

    public function deletePage()
    {
//        var_dump(1231);
        $link = $_POST['link'] ?? null;

        if (!$link) {
            Flash::error('Error');

            $this->redirectTo('/admin/moderation/staticPages');
        }

        $pageLink = $_SERVER['DOCUMENT_ROOT'] . '/templates/staticPages/' . $link;

        var_dump($pageLink);
        unset($pageLink);

        Flash::warning('Page was deleted');

//        $this->redirectTo('/admin/moderation/staticPages');
    }
}
