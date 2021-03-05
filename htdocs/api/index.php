<?php

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
