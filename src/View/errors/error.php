<?php
if (http_response_code() == 404) {
    $errorMessage = 'Page not found';
} elseif (http_response_code() == 423) {
    $errorMessage = 'You have no roots';
} elseif (http_response_code() == 405) {
    $errorMessage = 'Error method';
}
//echo '<pre>';
//var_dump($_SERVER);
//echo '</pre>';
?>
<div class="container">
    <h2 class="display-4 text-danger text-center pt-5">Error <?= http_response_code() . '. ' . $errorMessage ?></h2>

</div>