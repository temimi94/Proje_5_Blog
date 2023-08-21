<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer;

        $mail->isSMTP();                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;               // Enable SMTP authentication
        $mail->Username   =  'hamdaouirogoya1994@gmail.com';    //Adresse email à utiliser
        $mail->Password   =  'yvywuzngoplcvnxf';         //Mot de passe de l'adresse email à utiliser
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

        // Sender info
        $mail->setFrom('blog.bona@gmail.com', 'Bona');

        // Add a recipient
        $mail->addAddress($_POST["email"]);
// Set email format to HTML
        $mail->isHTML(true);

        // Mail subject
        $mail->Subject = 'Rogaya blog personnel';

        // Mail body content
        $bodyContent = "Bonjour ,";
        $bodyContent .= "<p> Nous avons bien reçu votre message et ne manquerons pas de vous recontacter dans les plus brefs délais.</p>";
        $bodyContent .= "Cordialement,<br>";
        $bodyContent .= "Rogaya Blog personnel";
        $mail->Body    = $bodyContent;
// Send email 
        if(!$mail->send()) { 
            return "Le message n'a pas pu être envoyé. Erreur de messagerie: ".$mail->ErrorInfo; 
        } else { 
            header('Location: ../public/index.php?page=home');
        }