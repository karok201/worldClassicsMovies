<?php

/**
 * @var $post
 * @var $photo
*/

echo flash()->display(); 
?>

 <!-- Вывод содержания статьи -->
<div class="container post">
    <div class="col-md-4 col-lg-4"><h1 class="display-4"><?= $post->title ?></h1></div>
    <div class="col-md-12 col-lg-12"><h7>Date of publication: <?= date("d.m.Y",strtotime($post->created_at)) ?></h7></div>
    <?php $author = $post->user ?>
    <div class="col-md-12 col-lg-12"><h7>Author: <a href="/profile/<?= $author->profile_link ?>"><?= $author->email ?></a></h7></div>
    <div class="col-md-9 col-lg-9"><img src="<?= $photo . '?time=' . time() ?>" alt=""></div>
    <hr>
    <div><h2 class="display-6" style="background-color: gainsboro"><?= $post->description ?></h2></div>
    <hr>

    <div class="col-12 container">
        <h1 class="display-4"><?php if (!empty($comments)) { echo 'Comments'; } else { echo 'No comments';} ?></h1>
    </div>

    <div class="media-body">
        <?php if(isset($_SESSION['authorization'])): ?>
        <form method="post" action="/sendForm">
            <label for="comment"></label><label for="description"></label><textarea class="form-control" id="description" name="description" rows="3" placeholder="Write comment"></textarea>
            <br>
            <input type="submit" value="Add comment" class="btn btn-dark btn-lg">
            <input type="hidden" value="<?= $post->id ?>" name="postId" id="postId">
            <input type="hidden" name="sendComment">
            <input type="hidden" value="<?= $_SESSION['userId'] ?>" name="userId" id="userId">
        </form>
        <?php else: ?>
        <div class="col-md-3">
            <p>To add a сomment you need to log in</p>
            <a class="btn btn-danger btn-sm" href="/authorization">Log in</a>
        </div>
        <?php endif; ?>
        <div id="result_form"></div>
    </div>
    <br>
    <?php $comments = $post->comments; ?>
    <?php foreach ($comments as $comment): ?>
    <?php $user = $comment->user ?>
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            <?php if ($_SESSION['role'] == 1): ?>
                <div>
                    <form method="post" action="/sendForm">
                        <input hidden name="deleteComment">
                        <input hidden name="postId" value="<?= $post->id ?>">
                        <input hidden name="id" value="<?= $comment->id ?>">
                        <button class="btn btn-outline-dark btn-sm">Delete comment</button>
                    </form>
                </div>
            <?php endif; ?>
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                <?php
                $photo = '/img/avatars/user-' . $user->id . '.jpg';
                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
                    $photo = '/img/avatars/avatar.jpg';
                }
                ?>
                <a href="/profile/<?= $user->profile_link ?>" class="link-dark"><img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="<?= $photo . '?time=' . time() ?>" alt=""></a>
                <div class="g-mb-15">
                    <a href="/profile/<?= $user->profile_link ?>" class="link-dark"><h5 class="h5 g-color-gray-dark-v1 mb-0"><?= $user->name . ' ' . $user->surname ?></h5></a>
                    <span class="g-color-gray-dark-v4 g-font-size-12"><?= date("d.m.Y",strtotime($comment->created_at)) ?></span>
                </div>

                <p><?= $comment->description ?></p>
            </div>
        </div>
    </div>
    <hr>
    <?php endforeach ?>
</div>


