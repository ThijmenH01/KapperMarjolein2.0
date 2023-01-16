<?php
include("db.php");

//Include required PHPMailer files
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create instance of PHPMailer
$mail = new PHPMailer();



session_start();
try {
     $email = $_SESSION['email'];
     $naam = $_SESSION['naam'];
     $afspraakdatum = $_SESSION['afspraakdatum'];
     print_r($email);
     //Server settings

     //$mail->SMTPDebug = 2;                                     // Enable verbose debug output
     $mail->isSMTP();                                            // Send using SMTP
     $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
     $mail->Username   = 'thijmenh00@gmail.com';                 // SMTP username
     $mail->Password   = 'knfwessnzbctkxjz';                     // SMTP password
     $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
     $mail->Port       = 587;                                    // TCP port to connect to

     //Recipients
     $mail->setFrom('thijmenh00@gmail.com', 'Kapper Marjolein');           // Verzener
     $mail->addAddress($email, $naam);                  // Onvanger
     // $mail->addReplyTo('thijmenh00@gmail.com');

     // Content
     $mail->isHTML(true);                                        // Set email format to HTML
     $mail->Subject = 'Afspraakbevestiging';
     $mail->Body    =
          'Beste ' . $naam . ',<br><br>' .
          'Bedankt voor het maken van een afspraak bij ons! <br><br>' .
          'Hier bij uw bevestiging voor ' . str_replace("T", " ", $afspraakdatum) . ' bij Kapper Marjolein. <br><br>' .
          'Met vriendelijke groet, <br>' .
          'Kapper Marjolein';

     $mail->send();

     $_SESSION['status'] = "Mail sent";

     header("location:../bevestigen");

     echo ($_SESSION['status']);
     $mail->smtpClose();
     exit();
} catch (Exception $e) {
     $_SESSION['status'] = "Mail not sent";

     header("location:../bevestigen");

     echo ($_SESSION['status']);
     $mail->smtpClose();
}
