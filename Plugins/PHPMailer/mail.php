<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';  // Composer autoloader
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

// Get user input (replace with actual POST/DB logic)
$user_email = isset($_POST['email']) ? $_POST['email'] : '';
$user_name = isset($_POST['name']) ? $_POST['name'] : '';

// Validate email
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email address.');
}

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'vrindevj@gmail.com';
    $mail->Password   = 'qiyc qaed gdmu ehtm';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('noreply@gaminghub.org', 'Gaming Hub');
    $mail->addAddress($user_email, $user_name);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to Gaming Hub! Account Verification';
    $mail->Body    = "Hello {$user_name},<br><br>You requested an account on Gaming Hub.<br><br>In order to use this account you need to <a href='#'>Click Here</a> to complete the registration process.<br><br>Regards,<br>Systems Admin<br>Gaming Hub";
    $mail->AltBody = "Hello {$user_name},\nYou requested an account on Gaming Hub.\nIn order to use this account you need to complete the registration process.\nRegards,\nSystems Admin\nGaming Hub";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}