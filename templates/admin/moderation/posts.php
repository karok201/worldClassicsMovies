<?php
/**
** @var $posts
** @var $countAllPosts
 * @var $kol
*/
echo flash()->display();
?>
<div class="container">
    <div class="col-12 text-center p-3">
        <a href="/admin/moderation/addPost" class="btn btn-dark btn-lg">Add new post</a>
    </div>
<?php for ($i = 0; $i < $kol; $i++): ?>
    <?php if(isset($posts[$i])): ?>
    <div class="row col-4">
    <div class="col-2">
        <form class="adminForm" action="/admin/moderation/changePost" method="post">
            <input type="hidden" name="id"          value="<?= $posts[$i]->id ?>">
            <input type="hidden" name="title"       value="<?= $posts[$i]->title ?>">
            <input type="hidden" name="description" value="<?= $posts[$i]->description ?>">
            <button type="submit" value="submit" class="btn btn-outline-info btn-sm">Change</button>
        </form>
    </div>
    <div class="col-2 text-left">
        <form action="/admin/sendForm" method="post">
            <input hidden name="deletePost">
            <input hidden name="postId" value="<?= $posts[$i]->id ?>">
            <button class="btn btn-outline-dark btn-sm" type="submit">Delete</button>
        </form>
    </div>
    </div>
    <a href="/post/<?= $posts[$i]->id ?>" class="page-link link-dark">
        <div class="media g-mb-30 media-comment">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                <?php
                $photo = '/img/posts/post-' . $posts[$i]->id . '.jpg';
                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
                    $photo = '/img/posts/post.jpg';
                }
                ?>
                <img class="d-flex g-width-100 g-height-50 rounded-3 g-mt-3 g-mr-15" src="<?= $photo . '?time=' . time() ?>" alt="">
                <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0"><?= $posts[$i]->title ?></h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12">Updated:<?= date("d.m.Y",strtotime($posts[$i]->updated_at)) ?></span>
                    <span class="g-color-gray-dark-v4 g-font-size-12">Created:<?= date("d.m.Y",strtotime($posts[$i]->created_at)) ?></span>
                </div>
            </div>
        </div>
    </a>
    <hr>
    <?php endif; ?>
<?php endfor; ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            for ($i = 1; $i <= ceil($countAllPosts / $kol); $i++) {
                ?>
                <li class="page-item"><a class="page-link" href="/admin/moderation/posts/<?=$i?>"><?= $i ?></a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</div>
