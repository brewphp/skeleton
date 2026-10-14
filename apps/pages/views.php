<?php

declare(strict_types=1);

namespace Apps\Pages;

use BrewPHP\Core\Application;
use BrewPHP\Http\Request;
use BrewPHP\Http\Response;

/**
 * The home page. Edit apps/pages/templates/pages/home.html to change it.
 */
function home(Request $request): Response
{
    return render('pages/home.html', [
        'version' => Application::VERSION,
        'debug' => (bool) settings('DEBUG'),
    ]);
}
