#!/usr/bin/env php
<?php

declare(strict_types=1);

/*
 * The command-line entry point: php manage.php <command>
 * Run "php manage.php list" to see every command.
 */

require __DIR__ . '/vendor/autoload.php';

exit(BrewPHP\Core\Application::create(__DIR__)->runConsole($argv));
