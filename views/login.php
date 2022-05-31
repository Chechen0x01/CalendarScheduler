<?php

use app\services\PageBuilder;


?>

<!doctype html>
<html lang="en">
<?php PageBuilder::part('head') ?>
<body>
<div class="container mt-4 short">
    <?php PageBuilder::part('title') ?>
    <div class="row">
        <form method="POST">

        </form>
    </div>
</div>
<?php PageBuilder::part('script') ?>
</body>
</html>
