<?php

echo flash()->display();

?>
<div class="container">
    <div class="col-12 text-center p-3">
        <a href="/admin/moderation/addStaticPage" class="btn btn-dark btn-lg">Add new staticPage</a>
    </div>
    <?php foreach (scandir($_SERVER['DOCUMENT_ROOT'] . '/templates/staticPages') as $page): ?>
        <?php if ($page !== '.' && $page !== '..'): ?>
<!--            <div class="row col-4">-->
<!--                <div class="col-2 text-left">-->
<!--                    <form action="/admin/sendForm" method="post">-->
<!--                        <input hidden name="deletePage">-->
<!--                        <input hidden name="link" value="--><?//= $page ?><!--">-->
<!--                        <button class="btn btn-outline-dark btn-sm" type="submit">Delete</button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
            <a href="<?= '/' . substr($page, 0, -4) ?>" class="page-link link-dark">
                <div class="media g-mb-30 media-comment">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                        <?= ucfirst(substr($page, 0, -4)) ?>
                    </div>
                </div>
            </a>
            <hr>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
