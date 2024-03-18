<?php
session_start();
$email = $_SESSION['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/mainPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Main</title>
</head>
<body>
<header id="headerFront">
    <h1>
        <a
                href="../main/index.php">Reservation System
        </a>
    </h1>
    <ul id="headerUL">
        <?php if ($email) {
            ?>
            <li>
                <form action="../logout/logout.php" method="post">
                    <button class="btn-warning btn" href="">Wyloguj</button>
                </form>
            </li>
            <?php
        } else { ?>
            <li><a href="../logging/login.panel.php">Zaloguj</a></li>
            <li><a href="../register/register.panel.php">Register</a></li>
        <?php } ?>
        <nav>
            <ul id="navUl">
                <li><a href="../hotels/show.hotel.php">Hotels</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
    </ul>
</header>


</body>
</html>
