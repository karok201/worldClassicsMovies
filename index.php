<?php

use App\Application;
use App\Controllers\Pages\AdminController;
use App\Controllers\Pages\HomeController;
use App\Controllers\Pages\StaticPageController;
use App\Controllers\Pages\TemplatesController;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . '/bootstrap.php';

$router = new Router();

$staticPages = scandir($_SERVER['DOCUMENT_ROOT'] . '/templates/staticPages/');
foreach ($staticPages as $staticPage) {
    if ($staticPage !== '.' && $staticPage !== '..') {
        $router->get(substr($staticPage, 0, -4), [StaticPageController::class, 'staticPage']);
    }
}

$router->get ('',                             [HomeController::class,       'index'          ]);
$router->get ('exit',                      [TemplatesController::class, 'exit' ]);
$router->get ('posts/*',                      [TemplatesController::class, 'postsPagination' ]);
$router->get ('registration',                 [TemplatesController::class, 'registration'    ]);
$router->get ('authorization',                [TemplatesController::class, 'authorization'   ]);
$router->get ('post/*',                       [TemplatesController::class, 'post'            ]);
$router->get ('profile/*',                    [TemplatesController::class, 'profile'         ]);
$router->get ('*/subscribes',                 [TemplatesController::class, 'subscribes'      ]);
$router->get ('changeProfile',                [TemplatesController::class, 'changeProfile'   ]);
$router->post('profile/*',                    [TemplatesController::class, 'profile'         ]);
$router->post('registration',                 [TemplatesController::class, 'registration'    ]);
$router->post('authorization',                [TemplatesController::class, 'authorization'   ]);
$router->post('post/*',                       [TemplatesController::class, 'post'            ]);
$router->post('changeProfile',                [TemplatesController::class, 'changeProfile'   ]);
$router->post('sendForm',                [TemplatesController::class, 'sendForm'   ]);

$router->get ('admin/main',                   [AdminController::class,     'main'           ]);
$router->get ('admin/moderation/posts/*',     [AdminController::class,     'postsPagination']);
$router->get ('admin/moderation/subscribes',  [AdminController::class,     'subscribes'     ]);
$router->get ('admin/moderation/users',       [AdminController::class,     'users'          ]);
$router->get ('admin/moderation/comments',    [AdminController::class,     'comments'       ]);
$router->get ('admin/moderation/staticPages', [AdminController::class,     'staticPages'    ]);
$router->get ('admin/moderation/addStaticPage', [AdminController::class, 'addStaticPage']);
$router->post('admin/moderation/users',       [AdminController::class,     'users'          ]);
$router->post('admin/moderation/comments',    [AdminController::class,     'comments'       ]);
$router->post('admin/moderation/changePost',  [AdminController::class,     'changePost'     ]);
$router->post('admin/sendForm', [AdminController::class, 'sendForm']);
$router->post('admin/moderation/addPost',     [AdminController::class,     'addPost'        ]);
$router->get ('admin/moderation/addPost',     [AdminController::class,     'addPost'        ]);

$application = new Application($router);

$application->run($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
