<?php

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to require it into the script here
| so that we don't have to worry about manually loading any classes.
|
*/

require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bootstrap Laravel And The Test Environment
|--------------------------------------------------------------------------
|
| You may be using a micro-framework and don't require this bootstrap,
| so you're free to remove this if needed. Just delete this file if
| you don't need it.
|
*/

require __DIR__ . '/../tests/TestCase.php';
