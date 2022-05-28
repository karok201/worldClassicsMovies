<?php

use App\Controllers\UsersController;
use App\Controllers\CommentsController;
use App\Controllers\ProfilesController;

$usersController = new UsersController();
$commentsController = new CommentsController();
$profilesController = new profilesController();

if (isset($_POST['authorization'])) { // Авторизация
	$usersController->logIn();
} elseif (isset($_POST['registration'])) { // Регистрация
	$usersController->signIn();
} elseif (isset($_POST['sendComment'])) { // Отправить комментарий
    $commentsController->sendComment(); 
} elseif (isset($_POST['deleteComment'])) { // Удалить комментарий
    $commentsController->deleteComment('/post/' . $_POST['postId']);
} elseif (isset($_POST['deleteCommentFromProfile'])) {
    $commentsController->deleteComment('/profile/' . $_POST['profile_link']);
} elseif (isset($_POST['subscribe'])) { // Оформить подписку
    $profilesController->subscribe();
} elseif (isset($_POST['unSubscribe'])) { // Отменить подписку
    $profilesController->unSubscribe();
} elseif (isset($_POST['changeProfile'])) {
    $profilesController->edit();
}