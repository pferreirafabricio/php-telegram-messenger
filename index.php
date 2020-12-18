<?php

use Source\App\Notify;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

var_dump((new Notify())->getAllEnvironments());
