<?php

use Source\App\UpTimeChecker;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

(new UpTimeChecker)->check($_ENV['CONF_CHECK_URL']);
