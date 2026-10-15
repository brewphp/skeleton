<?php

declare(strict_types=1);

/*
 * Project settings.
 *
 * Values that differ between machines (debug mode, secrets, host names)
 * are read from .env with env(). Every setting is described at
 * https://docs.brewphp.dev/getting-started/configuration/
 */

use BrewPHP\Auth\AuthenticationMiddleware;
use BrewPHP\Auth\Validators;
use BrewPHP\Middleware\SecurityHeadersMiddleware;
use BrewPHP\Security\CsrfViewMiddleware;
use BrewPHP\Sessions\SessionMiddleware;
use BrewPHP\Templates\ContextProcessors;

return [
    // Detailed error pages. Never turn this on in production.
    'DEBUG' => env('DEBUG', false),

    // Signs sessions and other values. Keep it secret, keep it out of git.
    'SECRET_KEY' => env('SECRET_KEY', ''),

    // Domain names this site serves. A leading dot matches subdomains.
    'ALLOWED_HOSTS' => array_values(array_filter(array_map('trim', explode(',', (string) env('ALLOWED_HOSTS', ''))))),

    // Apps of this project: 'pages' is the folder apps/pages/. The brewphp.*
    // apps are built in: the admin, users and permissions, and database sessions.
    'INSTALLED_APPS' => [
        'brewphp.admin',
        'brewphp.auth',
        'brewphp.sessions',
        'pages',
    ],

    // Run around every request, outermost first. Sessions must come before
    // authentication; CSRF protection checks every POST form.
    'MIDDLEWARE' => [
        SecurityHeadersMiddleware::class,
        SessionMiddleware::class,
        CsrfViewMiddleware::class,
        AuthenticationMiddleware::class,
    ],

    'ROOT_URLCONF' => 'config/urls.php',

    // Templates: .html (and any other extension) use the BrewPHP template
    // language, .php files are plain PHP. See https://docs.brewphp.dev/topics/templates/
    'TEMPLATES' => [
        // Project-level template folders, searched before each app's templates/.
        'DIRS' => ['templates'],
        // Reuse compiled templates from storage/templates until their source changes.
        'CACHE' => true,
        // Raise an error for a missing variable instead of printing ''.
        'STRICT' => false,
        // Callables that add variables to every template rendered with render().
        'CONTEXT_PROCESSORS' => [
            [ContextProcessors::class, 'request'],
            [ContextProcessors::class, 'auth'],      // user and perms
            [ContextProcessors::class, 'messages'],  // flash messages
        ],
    ],

    // Sessions and logins. On an HTTPS site, set SECURE_COOKIES=true in .env
    // so the session and CSRF cookies are never sent over plain HTTP.
    'SESSION_COOKIE_SECURE' => env('SECURE_COOKIES', false),
    'CSRF_COOKIE_SECURE' => env('SECURE_COOKIES', false),
    'LOGIN_URL' => 'login',
    'LOGIN_REDIRECT_URL' => '/',

    // Rules for new passwords. See https://docs.brewphp.dev/topics/auth/
    'AUTH_PASSWORD_VALIDATORS' => [
        new Validators\UserAttributeSimilarityValidator(),
        new Validators\MinimumLengthValidator(minLength: 10),
        new Validators\CommonPasswordValidator(),
        new Validators\NumericPasswordValidator(),
    ],

    'APP_URL' => env('APP_URL', 'http://127.0.0.1:8000'),
    'TIME_ZONE' => env('TIME_ZONE', 'UTC'),
    'LANGUAGE' => 'en',
    'STATIC_URL' => '/static/',
    'MEDIA_URL' => '/media/',

    // Database connections; models use "default". SQLite needs no server:
    // the database is the file storage/db.sqlite3. ENGINE can also be
    // 'mysql' or 'pgsql'. See https://docs.brewphp.dev/topics/databases/
    'DATABASES' => [
        'default' => [
            'ENGINE' => env('DB_ENGINE', 'sqlite'),
            'NAME' => env('DB_NAME', 'storage/db.sqlite3'),
            'HOST' => env('DB_HOST', '127.0.0.1'),
            'PORT' => env('DB_PORT'),
            'USER' => env('DB_USER', ''),
            'PASSWORD' => env('DB_PASSWORD', ''),
        ],
    ],
];
