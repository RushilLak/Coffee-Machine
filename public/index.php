#!/usr/bin/env php
<?php // application.php

require __DIR__ . '/../vendor/autoload.php';

use GetWith\CoffeeMachine\Kernel;
use Symfony\Component\HttpFoundation\Request;

$kernel = new Kernel($_SERVER['APP_ENV'], (bool)$_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
