<?php

require 'vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Dotenv\Dotenv;

function addFighter($l){

    // TODO ajouter le code pour inserer un combattant

    $l->info("The fighter is added to the database");
}

// Premiers pas avec Composer
print("Premiers pas avec Composer \n\n");


// create a log channel
$log = new Logger('Application SIO');
$log->pushHandler(new StreamHandler('log/info.log', Level::Warning));


$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

addFighter($log);


