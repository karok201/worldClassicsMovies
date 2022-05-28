<section class="get-in-touch">
    <h1 class="title">Change profile</h1>
    <form method="post" class="contact-form row" enctype="multipart/form-data" action="/sendForm">
        <div class="form-field col-lg-6">
            <input id="name" name="name" value="<?=$_POST['name']?>" class="input-text js-input" type="text" required>
            <label class="label" for="name">Change name</label>
        </div>
        <div class="form-field col-lg-6 ">
            <input id="surname" name="surname" value="<?=$_POST['surname']?>" class="input-text js-input" type="text" required>
            <label class="label" for="surname">Change surname</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="email" name="email" class="input-text js-input" value="<?=$_POST['email']?>" type="email" required>
            <label class="label" for="email">Change e-mail</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="password" name="password" class="input-text js-input" type="password"  required>
            <label class="label" for="password">Confirm password</label>
        </div>
        <div>
            <?php
            $photo = '/img/avatars/user-' . $_POST['id'] . '.jpg';
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $photo)) {
                $photo = '/img/avatars/avatar.jpg';
            }
            ?>
            <label for="formFileLg" class="form-label"><img src="<?= $photo . '?time=' . time() ?>" height="50" width="50" alt=""></label>
            <input class="form-control form-control-file" name="avatar" id="avatar" type="file">
        </div>
        <input type="number" hidden name="id" value="<?= $_POST['id'] ?>">
        <input type="hidden" name="changeProfile">
        <div class="form-field col-lg-12">
            <input class="submit-btn" type="submit" value="Submit">
        </div>
    </form>
</section>
