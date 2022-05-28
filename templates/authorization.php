<?php echo flash()->display(); ?>
<section class="get-in-touch">
    <h1 class="title">Log in touch</h1>
    <form class="contact-form row" action="/sendForm" method="post">
        <div class="form-field col-lg-12">
            <input value="<?php echo $_COOKIE['email'] ?? ''?>" id="email" name="email" class="input-text js-input" type="email" required>
            <label class="label" for="email">E-mail</label>
        </div>
        <div class="form-field col-lg-12">
            <input value="<?php echo $_COOKIE['password'] ?? ''?>" id="password" name="password" class="input-text js-input" type="password" required>
            <label class="label" for="password">Password</label>
        </div>
        <input type="hidden" name="authorization">
        <div class="form-field col-lg-12">
            <input class="submit-btn" type="submit" value="Submit">
        </div>
    </form>
</section>
