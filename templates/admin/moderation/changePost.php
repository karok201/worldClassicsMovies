<?php echo flash()->display(); ?>
<section class="get-in-touch">
    <h1 class="title">Change post</h1>
    <form action="/admin/sendForm" class="contact-form row" method="post" enctype="multipart/form-data">
        <div class="form-field col-lg-6">
            <input id="title" name="title" value="<?= $_POST['title'] ?>" class="input-text js-input" type="text" required>
            <label class="label" for="title">Title</label>
        </div>
        <div class="form-field col-lg-12">
            <textarea class="input-text js-input" name="description" id="description"><?= $_POST['description'] ?></textarea>
            <label class="label" for="description">Description</label>
        </div>
        <div>
            <label for="formFileLg" class="form-label"><img src="/img/posts/post-<?= $_POST['id'] ?>.jpg?time=<?= time() ?>" height="50" width="100" alt=""></label>
            <input class="form-control form-control-file" name="post" id="post" type="file">
        </div>
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <input type="hidden" name="changePost">
        <div class="form-field col-lg-12">
            <input class="submit-btn" type="submit" value="Submit">
        </div>
    </form>
</section>
