<?php

require 'vendor/autoload.php';


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\Dotenv\Dotenv;

// Premiers pas avec Composer
print("Premiers pas avec les sessions et les cookies \n\n");

// create a log channel
$log = new Logger('Application SIO');
$log->pushHandler(new StreamHandler('log/info.log', Level::Debug));

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

