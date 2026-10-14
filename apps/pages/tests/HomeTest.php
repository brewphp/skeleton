<?php

declare(strict_types=1);

namespace Apps\Pages\Tests;

use BrewPHP\Core\Application;
use BrewPHP\Http\Request;
use PHPUnit\Framework\TestCase;

final class HomeTest extends TestCase
{
    public function testHomePageLoads(): void
    {
        $app = Application::create(dirname(__DIR__, 3));

        $response = $app->handle(Request::create('GET', '/'));

        self::assertSame(200, $response->status());
        self::assertStringContainsString('Welcome to BrewPHP', $response->content());
        self::assertSame('/', reverse('pages:home'));
    }
}
