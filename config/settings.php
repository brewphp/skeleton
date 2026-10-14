<?php

declare(strict_types=1);

/*
 * Project settings.
 *
 * Values that differ between machines (debug mode, secrets, host names)
 * are read from .env with env(). Every setting is described at
 * https://docs.brewphp.dev/getting-started/configuration/
 */

use BrewPHP\Middleware\SecurityHeadersMiddleware;

return [
    // Detailed error pages. Never turn this on in production.
    'DEBUG' => env('DEBUG', false),

    // Signs sessions and other values. Keep it secret, keep it out of git.
    'SECRET_KEY' => env('SECRET_KEY', ''),

    // Domain names this site serves. A leading dot matches subdomains.
    'ALLOWED_HOSTS' => array_values(array_filter(array_map('trim', explode(',', (string) env('ALLOWED_HOSTS', ''))))),

    // Apps of this project: 'pages' is the folder apps/pages/.
    'INSTALLED_APPS' => [
        'pages',
    ],

    // Run around every request, outermost first.
    'MIDDLEWARE' => [
        SecurityHeadersMiddleware::class,
    ],

    'ROOT_URLCONF' => 'config/urls.php',

    // Project-level template folders, searched before each app's templates/.
    'TEMPLATES' => [
        'DIRS' => ['templates'],
    ],

    'APP_URL' => env('APP_URL', 'http://127.0.0.1:8000'),
    'TIME_ZONE' => env('TIME_ZONE', 'UTC'),
    'LANGUAGE' => 'en',
    'STATIC_URL' => '/static/',
    'MEDIA_URL' => '/media/',
];
