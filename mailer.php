<?php include 'includes/session.php'; ?>
<?php
require_once('mailer/SMTP.php');
require_once('mailer/PHPMailer.php');
require_once('mailer/Exception.php');
require_once('mailer/PHPMailer.php');

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'emailproject20@gmail.com';                 // SMTP username
$mail->Password = '123456789@@';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('emailproject20@gmail.com', 'emailproject20');
$mail->addAddress($emailconf , $_SESSION['firstname']);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($emailconf , $_SESSION['firstname']);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Forget Password';
$mail->Body    = '<h3> Hi '.$_SESSION['firstname'].' </h3>  <p> Ur Code For Reset Ur Password Is : '.$randomm.' </p>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else {
    echo 'Message has been sent';
}

// STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION

// require_once('mailer/SMTP.php');
// require_once('mailer/PHPMailer.php');
// require_once('mailer/Exception.php');

// use \PHPMailer\PHPMailer\PHPMailer;
// use \PHPMailer\PHPMailer\Exception;

// $mail=new PHPMailer(true); // Passing `true` enables exceptions

// try {
//     //settings
//     $mail->SMTPDebug=2; // Enable verbose debug output
//     $mail->isSMTP(); // Set mailer to use SMTP
//     $mail->Host='smtp.gmail.com';
//     $mail->SMTPAuth=true; // Enable SMTP authentication
//     $mail->Username='infoprog79@gmail.com'; // SMTP username
//     $mail->Password='proginfo790123'; // SMTP password
//     $mail->SMTPSecure='ssl';
//     $mail->Port=465;

//     $mail->setFrom('infoprog79@gmail.com', 'programmer');

//     //recipient
//     $mail->addAddress('91872adb50@emailnax.com', 'bodi');     // Add a recipient

//     //content
//     $mail->isHTML(true); // Set email format to HTML
//     $mail->Subject='Here is the subject';
//     $mail->Body='wllcome';
//     $mail->AltBody='This is the body in plain text for non-HTML mail clients';

//     //$mail->send();

//     echo 'Message has been sent';
// } 
// catch(Exception $e) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: '.$mail->ErrorInfo;
// }
