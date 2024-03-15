<?php

use controllers\RegisterAccountController;

require_once __DIR__ . "/../../includes/autoloader.php";

$controller = new RegisterAccountController('name', 'surname', 'password', 'email', 'phone');
$controller->newAccount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../../styles/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
</head>
<body>
<main>
    <div id="container">
        <div id="form">
            <form action="" method="POST">
                <div class="input-container">
                    <input type="text" id="name" name="name" maxlength="12" required placeholder="First name"><br>
                    <i class="fa fa-user icon"></i>
                </div>
                <div class="input-container">
                    <input type="text" id="surname" name="surname" maxlength="12" required placeholder="Last name"><br>
                    <i class="fa fa-user icon"></i>
                </div>
                <div class="input-container">
                    <input type="email" id="email" name="email" required placeholder="Email"><br>
                    <i class="fa fa-envelope-o icon"></i>
                </div>
                <div class="input-container">
                    <input type="password" id="password" name="password" required placeholder="Password"><br>
                    <i class="fa fa-lock icon"></i>
                </div>
                <div class="input-container">
                    <input type="text" id="phone" name="phone" placeholder="Phone"><br>
                    <i class="fa fa-phone icon"></i>
                </div>
                <input id="register" type="submit" value="Zarejestruj">
            </form>
        </div>
    </div>
</main>

</body>
</html>