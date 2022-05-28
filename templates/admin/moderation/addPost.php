<?php echo flash()->display(); ?>
<section class="get-in-touch">
    <h1 class="title">Add new post</h1>
    <form class="contact-form row" action="/admin/sendForm" method="post" enctype="multipart/form-data">
        <div class="form-field col-lg-6">
            <input id="title" name="title" value="<?php if (isset($_COOKIE['title'])) { echo $_COOKIE['title']; } ?>" class="input-text js-input" type="text" required>
            <label class="label" for="title">Title</label>
        </div>
        <div class="form-field col-lg-12">
            <textarea class="input-text js-input" name="description" id="description"><?php if (isset($_COOKIE['description'])) { echo $_COOKIE['description']; } ?></textarea>
            <label class="label" for="description">Description</label>
        </div>
        <div>
            <label for="formFileLg" class="form-label">Photo</label>
            <input class="form-control form-control-file" name="post" id="post" type="file">
        </div>
        <input type="hidden" name="addPost">
        <div class="form-field col-lg-12">
            <input class="submit-btn" type="submit" value="Submit">
        </div>
    </form>
</section>

