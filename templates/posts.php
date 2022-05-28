<?php

/**
 * @var $posts
 * @var $kol
*/

?>
<div class="container">
<div class="row text-center alert">
    <div class="col-12">
        <h1 class="display-4">Here are all posts from our reviewers</h1>
    </div>
    <div class="col-12">
        <p class="lead">
            Please follow the terms of use of our website: <a href="/about">rules</a>
        </p>
    </div>
    <hr>
    <?php foreach($posts as $post): ?>
        <div class="col-md-6 col-sm-6 col-xs-6" style=" text-align: center; padding: 1vw 0 1vw 0;">
            <?php
            $photo = '/img/posts/post-' . $post->id . '.jpg';
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
                $photo = '/img/posts/post.jpg';
            }
            ?>
            <img src="<?= $photo . '?time=' . time() ?>" alt="">
            <div><h1 class="display-6"><?= cutString($post->title, 30) ?></h1></div>
            <div><h7><?= date("d.m.Y",strtotime($post->created_at)) ?></h7></div>
            <p class="lead"><?= cutString($post->description, 50) ?></p>
            <div>
                <a href="/post/<?= $post->id ?>">
                    <button class="btn btn-secondary btn-sm">Read more</button>
                </a>
            </div>
            <hr>
        </div>
    <?php endforeach; ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            for ($i = 1; $i <= ceil(count(\App\Models\Post::all()) / $kol); $i++) {
                ?>
                <li class="page-item>"><a class="page-link" href="/posts/<?=$i?>"><?= $i ?></a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</div>
</div>
