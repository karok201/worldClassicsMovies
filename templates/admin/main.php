<?php
/**
 * @var $kol
 */

echo flash()->display();
?>
<div class="container pt-5">
    <div class="row text-center alert">
        <div>
            <form action="/admin/sendForm" method="post">
            <label for="quantity">Choose quantity of posts on pages:</label>
            <select class="form-select-sm" id="quantity" name="kol">
                <option hidden=""><?= $kol ?></option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>200</option>
            </select>
            <input hidden name="changeQuantity">
            <button type="submit" class="btn btn-sm btn-dark">Change</button>
            </form>
        </div>
    <div class="col-12 pt-3">
        <a href="/admin/moderation/posts/1" class="link-dark"><h2 class="display-4">Moderate posts</h2></a>
    </div>
    <div class="col-12 pt-3">
        <a href="/admin/moderation/users" class="link-dark"><h2 class="display-4">Moderate users</h2></a>
    </div>
    <div class="col-12 pt-3">
        <a href="/admin/moderation/comments" class="link-dark"><h2 class="display-4">Moderate comments</h2></a>
    </div>
    </div>
</div>