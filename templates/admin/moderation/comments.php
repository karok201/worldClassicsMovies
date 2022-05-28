<?php

/**
 * @var $comments
 */

echo flash()->display();
?>
<div class="container">
    <?php if (empty($comments->toArray())): ?>
        <div class="row text-center">
            <h1 class="display-4">All comments are moderated</h1>
        </div>
    <?php else: ?>
        <div class="row text-center">
            <h1 class="display-4">Moderate comments</h1>
        </div>
    <?php endif; ?>
    <?php foreach ($comments as $comment): ?>
    <?php $user = $comment->user;?>
        <div class="col-md-8 container pb-3">
             <div>
                <form method="post" action="/admin/sendForm">
                    <input hidden name="deleteComment">
                    <input hidden name="id" value="<?= $comment->id ?>">
                    <button class="btn btn-outline-dark btn-sm">Delete comment</button>
                </form>
            </div>
            <div>
                <form method="post" action="/admin/sendForm">
                    <input hidden name="allowComment">
                    <input hidden name="id" value="<?= $comment->id ?>">
                    <button class="btn btn-outline-dark btn-sm">Allow comment</button>
                </form>
            </div>
            <a href="/post/<?= $comment->post_id ?>" class="page-link link-dark">
                <div class="media g-mb-30 media-comment">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="/img/avatars/avatar.jpg?time=<?= time() ?>" alt="">
                        <div class="g-mb-15">
                            <h5 class="h5 g-color-gray-dark-v1 mb-0"><?=  $user->name . ' ' . $user->surname ?></h5>
                            <span class="g-color-gray-dark-v4 g-font-size-12"><?= date("d.m.Y",strtotime($comment->created_at)) ?></span>
                        </div>
                        <p><?= $comment->description ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
