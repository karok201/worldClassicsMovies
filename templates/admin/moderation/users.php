<?php

/**
 * @var $users
 */

echo flash()->display();

?>
<div class="container">
    <?php
    foreach ($users as $user) {
        ?>
        <div class="col-md-8 container pb-3">
            <div class="media g-mb-30 media-comment">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                    <a href="/profile/<?= $user->profile_link ?>" class="page-link link-dark">
                        <?php
                        $photo = '/img/avatars/user-' . $user->id . '.jpg';
                        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
                            $photo = '/img/avatars/avatar.jpg';
                        }
                        ?>
                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="<?= $photo . '?time=' . time() ?>" alt="">
                        <div class="g-mb-15">
                            <h5 class="h5 g-color-gray-dark-v1 mb-0"><?= $user->name . ' ' . $user->surname ?></h5>
                            <span class="g-color-gray-dark-v4 g-font-size-12">Registration: <?= date("d.m.Y",strtotime($user->created_at)) ?></span>
                        </div>
                    </a>
                </div>
                <?php if ($_SESSION['profile_link'] !== $user->profile_link): ?>
                    <form method="post" action="/admin/sendForm">
                        <label>
                            <select class="form-select" name="roleId">
                                <option hidden><?= $user->userRole() ?></option>
                                <option value="1">Admin</option>
                                <option value="2">Content-manager</option>
                                <option value="3">Registered user</option>
                            </select>
                        </label>
                        <input hidden name="id" value="<?= $user->id ?>">
                        <input hidden name="changeRole">
                        <button class="btn btn-outline-dark btn-sm">Change</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
