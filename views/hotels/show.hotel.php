<?php

use controllers\HotelsController;

require_once __DIR__ . "/../../includes/autoloader.php";
$hotels = new HotelsController();
$hotels->show();
$pokazuj = $hotels->results;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php foreach ($pokazuj as $pokazuju) { ?>
<div class="card" style="width: 18rem; background: beige; padding-top: 2rem">
    <img src="" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">
            <?php
            echo $pokazuju['Name'];
            echo $pokazuju['Address'];
            ?>
        </h5>

        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    <?php } ?>
</div>


</body>
</html>