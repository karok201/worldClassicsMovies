<?php

echo flash()->display();
?>
<section class="get-in-touch">
    <h1 class="title">Create new static page</h1>
    <form method="post" action="/admin/sendForm" class="contact-form row" id="adminForm">
        <div class="form-field col-lg-6">
            <input id="title" name="title" class="input-text js-input" type="text" required>
            <label class="label" for="title">Title</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="link" name="link" class="input-text js-input" type="text" required>
            <label class="label" for="link">Link(must contain only letters and consist of one word)</label>
        </div>
        <div class="form-field col-lg-12">
            <textarea class="input-text js-input" name="description" id="description"></textarea>
            <label class="label" for="description">Description</label>
        </div>
        <input type="hidden" name="createStaticPage">
        <div class="form-field col-lg-12">
            <input class="submit-btn" type="submit" value="Submit">
        </div>
    </form>
</section>

