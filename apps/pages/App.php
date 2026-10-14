<?php

declare(strict_types=1);

namespace Apps\Pages;

use BrewPHP\Core\AppConfig;

/**
 * Configuration of the "pages" app (installed as 'pages' in INSTALLED_APPS).
 */
final class App extends AppConfig
{
    public string $verboseName = 'Pages';
}
