<?php

use controllers\LoginAccountController;

require_once __DIR__ . "/../../includes/autoloader.php";
$userLogin = new LoginAccountController('email', 'password');
$userLogin->loginUser();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="POST">
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Zaloguj">
</form>
<button type="submit">
<a href="../register/register.panel.php ">Zarejestruj sie</a>
</button>


</body>
</html>