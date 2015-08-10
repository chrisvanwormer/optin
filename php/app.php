<?php
//header('HTTP/1.1 503 Service Unavailable');
session_start();
require('phpmailer/PHPMailerAutoload.php');

if (isset($_GET['script'])) {
    $script = $_GET['script'];

    if ($script == 'optin') {
        // process post variables
        $name    = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if ($name == '' || $email == '') {
            // throw error for missing fields
            $html = '
                     <p class="clickit-error-text">Whoops. Looks like you missed something. Please fill in all the fields.</p>
                     <a class="close-reveal-modal">&#215;</a>';
            echo $html;
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // throw error for bad email
            $html = '
                     <p class="clickit-error-text">Looks like something isn\'t quite right with your email address. Please try again.</p>
                     <a class="close-reveal-modal">&#215;</a>';
            echo $html;
            exit();
        }

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $subject = "New Optin Submission";
        $body = "<p>Name: " . $name . "</p>\n";
        $body .= "<p>Email: " . $email . "</p>\n";

        mail('cvanwormer@gmail.com', $subject, $body, $headers);

        /*$mail = new PHPMailer();
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host = 'smtpout.secureserver.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'christina@iamfearlesslyme.com';
        $mail->Password = 'RiverGarden282';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->From = 'no-reply@rivergardenstudio.com';
        $mail->FromName = 'River Garden Studio Web';
        $mail->addAddress('richard.fisher@rivergardenstudio.com');
        $mail->Subject = 'Website Contact Submission';



        $mail->Body = $body;*/

        /*if (!$mail->send()) {
            // throw error for mail failure
            $html = '
                     <p class="clickit-error-text">Something funky happened. Please try again.</p>
                     <a class="close-reveal-modal">&#215;</a>';
            echo $html;
        }*/

        $html = '
                 <p>Thank you very much. Please click the link below to download your free pdf.</p>
                 <p><a href="http://iamfearlesslyme.com/optin/download/Love_Attracts_Love_Bigger.jpg">Download your pdf</a></p>
                 <a class="close-reveal-modal">&#215;</a>';
        echo $html;
    }
}