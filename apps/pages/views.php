<?php

declare(strict_types=1);

namespace Apps\Pages;

use BrewPHP\Core\Application;
use BrewPHP\Http\Request;
use BrewPHP\Http\Response;

/**
 * The home page. Edit apps/pages/templates/pages/home.php to change it.
 */
function home(Request $request): Response
{
    return render('pages/home.php', [
        'version' => Application::VERSION,
        'debug' => (bool) settings('DEBUG'),
    ]);
}
