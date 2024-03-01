<?php
require_once __DIR__ . "/../../includes/autoloader.php";

$controller = new \controllers\RegisterAccountController('name','surname','password','email','phone');
$controller->newAccount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="register.panel.php?success" method="POST">
    <label for="name">First name:</label><br>
    <input type="text" id="name" name="name" maxlength="12" required><br>
    <label for="surname">Last name:</label><br>
    <input type="text" id="surname" name="surname" maxlength="12" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone"><br>
    <input type="submit" value="Zarejestruj">
</form>


</body>
</html>