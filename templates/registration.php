<?php echo flash()->display(); ?>
<section class="get-in-touch">
    <h1 class="title">Sign in touch</h1>
    <form class="contact-form row" method="post" enctype="multipart/form-data" action="/sendForm">
        <div class="form-field col-lg-6">
            <input value="<?php echo $_COOKIE['name'] ?? ''?>" id="name" name="name" class="input-text js-input" type="text" required>
            <label class="label" for="name">Name</label>
        </div>
        <div class="form-field col-lg-6 ">
            <input value="<?php echo $_COOKIE['surname'] ?? ''?>" id="surname" name="surname" class="input-text js-input" type="text" required>
            <label class="label" for="surname">Surname</label>
        </div>
        <div class="form-field col-lg-6">
            <input value="<?php echo $_COOKIE['email'] ?? ''?>" id="email" name="email" class="input-text js-input" type="email" required>
            <label class="label" for="email">E-mail</label>
        </div>
        <div class="form-field col-lg-6">
            <input value="<?php echo $_COOKIE['password'] ?? ''?>" id="password" name="password" class="input-text js-input" type="password" required>
            <label class="label" for="password">Password</label>
        </div>
        <input type="hidden" name="registration">
        <label>Agree with <a href="/about">rules</a> of site <input type="checkbox" class="form__input"></label>
        <div class="form-field col-lg-12">
            <input class="btn btn-success" type="submit" value="Submit" disabled id="form__button">
        </div>
    </form>
</section>
