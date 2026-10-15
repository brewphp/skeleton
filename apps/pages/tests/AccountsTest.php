<?php

declare(strict_types=1);

namespace Apps\Pages\Tests;

use BrewPHP\Core\Application;
use BrewPHP\Http\Request;
use PHPUnit\Framework\TestCase;

final class AccountsTest extends TestCase
{
    public function testLoginPageHasACsrfProtectedForm(): void
    {
        $app = Application::create(dirname(__DIR__, 3));

        $response = $app->handle(Request::create('GET', '/accounts/login/'));

        self::assertSame(200, $response->status());
        self::assertStringContainsString('name="csrfmiddlewaretoken"', $response->content());
        self::assertStringContainsString('name="password"', $response->content());
        self::assertArrayHasKey('csrftoken', $response->cookies());
        self::assertSame('/accounts/login/', reverse('login'));
    }

    public function testFormsWithoutATokenAreRejected(): void
    {
        $app = Application::create(dirname(__DIR__, 3));

        $response = $app->handle(Request::create('POST', '/accounts/login/', ['username' => 'a', 'password' => 'b']));

        self::assertSame(403, $response->status());
    }
}
