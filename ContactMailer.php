
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $mobile = $_POST['tel'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $service = $_POST['service'];
    $desc = $_POST['description'];

    require 'mail/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'emailproject20@gmail.com';                 // SMTP username
    $mail->Password = '123456789@@';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom($email, $fullname);
    $mail->addAddress('emailproject20@gmail.com', 'emailproject20');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($email, $fullname);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Medicia';
    $mail->Body    =  'country : ' . $country . "<br> service : " . $service . "<br> description :  " . $desc;
    $mail->AltBody = 'Problem From Website User';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo ' <h5 class="text-center text-primary">Message has been sent</h5>';
    }
}

?>