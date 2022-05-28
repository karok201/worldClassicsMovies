<?php
/**
** @var $posts
*/

echo flash()->display(); ?>
    <!-- Блок с выводом слайдера -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" <?php if ($i == 0) { ?> class="active" aria-current="true" <?php } ?> aria-label="Slide <?= $i + 1 ?>"></button>
        <?php endfor; ?>
    </div>
    <div class="carousel-inner">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="<?php if ($i == 0) { echo 'carousel-item active'; } else { echo 'carousel-item';} ?>">
                <a href="/post/<?= $posts[$i]->id ?>">
                    <?php
                    $photo = '/img/posts/post-' . $posts[$i]->id . '.jpg';
                    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
                        $photo = '/img/posts/post.jpg';
                    }
                    ?>
                    <img src="<?= $photo . '?time=' . time() ?>" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $posts[$i]->title ?></h5>
                    </div>
                </a>
            </div>
        <?php endfor; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
    <!-- Блок с описанием сайта -->
<div class="container">
    <div class="row text-center alert">
        <div class="col-12">
            <h1 class="display-4">Here are four last posts from our reviewers</h1>
        </div>
        <hr>
        <div class="col-12">
            <p class="lead">
                Please follow the terms of use of our website: <a href="/about">rules</a>
            </p>
        </div>
        <?php for ($i = 0; $i < 4; $i++): ?>
            <div class="col-md-6 col-sm-6 col-xs-6" style=" text-align: center; padding: 1vw 0 1vw 0;">
                <?php
                $photo = '/img/posts/post-' . $posts[$i]->id . '.jpg';
                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
                    $photo = '/img/posts/post.jpg';
                }
                ?>
                <img src="<?= $photo . '?time=' . time() ?>" alt="">
                <div><h1 class="display-6"><?= cutString($posts[$i]->title, 25) ?></h1></div>
                <div><h7><?= date("d.m.Y",strtotime($posts[$i]->created_at)) ?></h7></div>
                <p class="lead"><?= cutString($posts[$i]->description, 45) ?></p>
                <div>
                    <a href="/post/<?= $posts[$i]->id ?>">
                        <button class="btn btn-secondary btn-sm">Read more</button>
                    </a>
                </div>
                <hr>
            </div>
        <?php endfor; ?>
    </div>
    <div class="row text-center" style="padding-bottom: 20px">
        <a href="/posts/1">
            <button class="btn btn-secondary btn-lg">All posts</button>
        </a>
    </div>
</div>