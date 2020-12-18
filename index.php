<?php

use Source\App\Notify;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$messenger = new Notify();

$messenger->sendAlertMessage('Olá mundo');
