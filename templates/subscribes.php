<?php
/**
** @var $profiles
*/
?>
<div class="col-md-6 container">
    <?php if (count($profiles) > 0): ?>
        <h1 class="display-4">Your subscriptions:</h1>
    <?php else: ?>
        <h1 class="display-4">You have no subscribes yet</h1>
    <?php endif; ?>
    <?php foreach ($profiles as $profile): ?>
        <a href="/profile/<?= $profile->profile_link ?>" class="page-link link-dark">
            <div class="media g-mb-30 media-comment">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <?php
                    $photo = '/img/avatars/user-' . $profile->id . '.jpg';
                    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
                        $photo = '/img/avatars/avatar.jpg';
                    }
                    ?>
                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="<?= $photo . '?time=' . time() ?>" alt="">
                    <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0"><?= $profile->name . ' ' . $profile->surname ?></h5>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
