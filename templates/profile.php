<?php

/**
 * @var $user
 * @var $comments
 * @var $isSubscribed
 * @var $photo
 */

echo flash()->display();
?>

<link type="text/css" href="/CSS/profileStyle.css">
<div class="container">
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <button class="btn btn-secondary">
                <img src="<?= $photo . '?time=' . time() ?>" height="auto" width="100"  alt=""/>
            </button>
            <span class="name mt-3"><?= $user['name'] . ' ' . $user['surname'] ?></span> <span class="idd"><?= $user['email'] ?></span>
            <?php if ($_SESSION['userId'] == $user['id']): ?>
            <div class=" d-flex mt-2">
                <form action="/changeProfile" method="post">
                    <input type="hidden" name="name" id="name" value="<?= $user['name'] ?>">
                    <input type="hidden" name="surname" id="surname" value="<?= $user['surname'] ?>">
                    <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">
                    <input type="hidden" name="email" id="email" value="<?= $user['email'] ?>">
                    <button class="btn1 btn-dark">Edit Profile</button>
                </form>
            </div>
            <?php endif; ?>
            <?php if ($user['profile_link'] == $_SESSION['profile_link']): ?>
            <br>
            <button class="btn btn-sm btn-dark">You</button>
            <?php elseif ($isSubscribed != true): ?>
            <div class=" d-flex mt-2">
                <form action="/sendForm" method="post">
                    <input hidden name="authorId" value="<?= $user['id'] ?>">
                    <input hidden name="authorProfileLink" value="<?= $user['profile_link'] ?>">
                    <button class="btn1 btn-success" name="subscribe">Subscribe</button>
                </form>
            </div>
            <?php else: ?>
            <div class=" d-flex mt-2">
                <form action="/sendForm" method="post">
                    <input hidden name="authorId" value="<?= $user['id'] ?>">
                    <input hidden name="authorProfileLink" value="<?= $user['profile_link'] ?>">
                    <button class="btn1 btn-danger" name="unSubscribe">Unsubscribe</button>
                </form>
            </div>
            <?php endif ?>
            <div class=" px-2 rounded mt-4 date "> <span class="join">Joined <?= date("d.m.Y",strtotime($user['created_at'])) ?></span> </div>
        </div>
    </div>
</div>
    <?php foreach ($comments as $comment): ?>
    <div class="col-md-8 container pb-3">
        <?php if ($_SESSION['role'] == 1): ?>
            <div>
                <form action="/sendForm" method="post">
                    <input hidden name="deleteComment">
                    <input hidden name="id" value="<?= $comment['id'] ?>">
                    <input hidden name="profile_link" value="<?= $user['profile_link'] ?>">
                    <button class="btn btn-outline-dark btn-sm">Delete comment</button>
                </form>
            </div>
        <?php endif; ?>
        <a href="/post/<?= $comment['post_id'] ?>" class="page-link link-dark">
            <div class="media g-mb-30 media-comment">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="<?= $photo . '?time=' . time() ?>" alt="">
                    <div class="g-mb-15">
                        <span class="g-color-gray-dark-v4 g-font-size-12"><?= date("d.m.Y",strtotime($comment['created_at'])) ?></span>
                    </div>
                    <p><?= $comment['description'] ?></p>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>