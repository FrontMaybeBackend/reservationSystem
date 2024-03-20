<?php

use PHPUnit\Framework\TestCase;
use src\controllers\LoginAccountController;

require_once __DIR__ . "/../../includes/autoloader.php";
final class TestRegister extends TestCase {

    public function testClassConstructor()
    {
        $user = new LoginAccountController('John',18);
        $this->assertSame('John', $user->email);
        $this->assertSame(18, $user->password);

    }
}