<?php

declare(strict_types=1);

/*
 * The front controller: every web request starts here.
 * Point your web server's document root at this public/ folder.
 */

require __DIR__ . '/../vendor/autoload.php';

BrewPHP\Core\Application::create(dirname(__DIR__))->run();
