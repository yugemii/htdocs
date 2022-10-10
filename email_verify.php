<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
include "lib.php";
include "PHPMailer.php";
include "SMTP.php"; 

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_OFF;

//Set the hostname of the mail server
$mail->Host = 'smtp.naver.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = "ssl";

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'ID';

//Password to use for SMTP authentication
$mail->Password = 'PASSWORD';

//Password to use for SMTP authentication
$mail->CharSet = 'UTF-8';

//Set who the message is to be sent from
$mail->setFrom('EMAIL@naver.com', 'NAME');

//Set an alternative reply-to address
$mail->addReplyTo('EMAIL@naver.com', 'NAME');

//Set who the message is to be sent to
$mail->addAddress($_SESSION["useremail"], $_SESSION["username"]);

//Set the subject line
$mail->Subject = '메일 테스트입니다. ';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("Email verify! http://url/verify.php?uid=".$_SESSION['username']."&hash=".$_SESSION['userhash']);
//Replace the plain text body with one created manually
$mail->AltBody = '내용이 정상적으로 전송되지 않았습니다.';

//Attach an image file
// $mail->addAttachment('a.jpg');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    session_destroy();
    echo '<script>alert("메일이 정상적으로 전송되었습니다. 메일함을 확인해주세요.");
    location.href="index.php";</script>';

}