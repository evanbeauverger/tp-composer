<?php

require 'vendor/autoload.php';

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Dotenv\Dotenv;


// Premiers pas avec Composer
print("Premiers pas avec Composer \n\n");


// create a log channel
$log = new Logger('Application SIO');
$log->pushHandler(new StreamHandler('log/info.log', Level::Warning));


$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

// add records to the log
$log->info("Démarrage de l'envoi d'un mail");
$mail = new PHPMailer(True);

try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USERNAME'];
    $mail->Password = $_ENV['SMTP_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $_ENV['SMTP_PORT'];

    $mail->setFrom($_ENV['SMTP_USERNAME'], $_ENV['SMTP_NAME']);
    $mail->addAddress($_ENV['SMTP_USERNAME'], $_ENV['SMTP_NAME']);
    $mail->Subject = 'Ceci est un test';
    $mail->Body    = "Ceci est un test d'envoi d'un mail avec Infomaniak et Composer.";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
   $log->error("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
}


$log->info("The mail is sent");