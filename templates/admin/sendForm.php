<?php

use App\Controllers\CommentsController;
use App\Controllers\ProfilesController;
use App\Controllers\PostsController;
use App\Controllers\Pages\StaticPageController;

$postsController = new PostsController();
$commentsController = new CommentsController();
$profilesController = new ProfilesController();
$staticPageController = new StaticPageController();

if (isset($_POST['addPost'])) {
    $postsController->addPost();
} elseif (isset($_POST['deletePost'])) {
	$postsController->deletePost();
} elseif (isset($_POST['changePost'])) {
    $postsController->changePost();
} elseif (isset($_POST['deleteComment'])) {
    $commentsController->deleteComment('/admin/moderation/comments');
} elseif (isset($_POST['allowComment'])) {
    $commentsController->allowComment();
} elseif (isset($_POST['changeRole'])) {
    $profilesController->changeRole();
} elseif (isset($_POST['changeQuantity'])) {
    $postsController->changeQuantity($_POST['kol']);
} elseif (isset($_POST['createStaticPage'])) {
    $staticPageController->createPage();
} elseif (isset($_POST['deletePage'])) {
    $staticPageController->deletePage();
}