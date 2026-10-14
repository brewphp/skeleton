<?php

declare(strict_types=1);

/*
 * The root URLconf: maps URLs to views. Routes are tried in order and the
 * first match wins. See https://docs.brewphp.dev/topics/routing/
 */

return [
    path('', include_urls('apps/pages/urls.php', namespace: 'pages')),
];
