<?php

declare(strict_types=1);

/*
 * The root URLconf: maps URLs to views. Routes are tried in order and the
 * first match wins. See https://docs.brewphp.dev/topics/routing/
 */

use BrewPHP\Auth\Urls as AuthUrls;

return [
    path('', include_urls('apps/pages/urls.php', namespace: 'pages')),
    // Log in, log out and change password: /accounts/login/ and so on.
    path('accounts/', include_urls(AuthUrls::patterns())),
];
