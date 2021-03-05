<?php

use Avalihub\Request;
use Dotenv\Dotenv;

require(__DIR__ . '/../../vendor/autoload.php');
require_once(__DIR__ . '/helper/Request.php');

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
try {
    $dotenv->required([
        'HOST',
        'API',
        'DB_HOST',
        'DB_PORT',
        'DB_USERNAME',
        'DB_PASSWORD',
        'DB_SCHEMA'
    ])->notEmpty();
} catch (Exception) {
    http_response_code(500);
    die(".env is not correctly set");
}

$result = null;

// Service Dispatcher
$request = new Request($_SERVER);
$parts = $request->getParts();

if (str_starts_with($parts[1], 'user')) {
    if ($parts[1] === 'user') {

    } else if ($parts[1] === 'users') {

    }
}

if ($result === null) {
    $request->badRequest();
} else {
    $result->sendResult();
}