<?php

require "../../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$mail = new PHPMailer (true);

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = $_ENV['SMTP_HOST'];
$mail->STMPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = $_ENV['SMTP_PORT'];

$mail->Username = $_ENV['SMTP_USER'];
$mail->Password = $_ENV['SMTP_PASS'];


$mail->isHtml(true);

return $mail;

?>