<?php

require 'phpmailer/PHPMailerAutoload.php';


$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user__name'];
$email = $_POST['user__email'];
$message = $_POST['user__message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.sendgrid.net';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'apikey'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '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'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('its.sakovich@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('hi@prisma.la');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Landing input';
$mail->Body    = 'Name: ' .$name . '<br>Message: ' .$message. '<br>Mail: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('location: thank-you.html');
}
?>
