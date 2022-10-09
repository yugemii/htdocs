<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

 
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
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

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
$mail->Username = 'study070';

//Password to use for SMTP authentication
$mail->Password = 'BM8HG6RLVGK4';

//Password to use for SMTP authentication
$mail->CharSet = 'UTF-8';

//Set who the message is to be sent from
$mail->setFrom('study070@naver.com', '이유경');

//Set an alternative reply-to address
$mail->addReplyTo('study070@naver.com', '이유경');

//Set who the message is to be sent to
$mail->addAddress('uksohun1@gmail.com', '이유경');

//Set the subject line
$mail->Subject = '메일 테스트입니다. ';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("가입해주셔서 감사합니다. 게시판을 이용하실 수 있습니다.
<a href='http://117.16.17.186:9879/board.php'>http://117.16.17.186:9879/board.php</a>");

//Replace the plain text body with one created manually
$mail->AltBody = '내용이 정상적으로 전송되지 않았습니다.';

//Attach an image file
// $mail->addAttachment('a.jpg');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    include "lib.php";
    $uid = $_GET['uid'];
    $query = "SELECT * FROM users WHERE uid=$uid";
    $sql = "UPDATE users SET active='1' WHERE uid=$uid";
    $conn -> query($sql);
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}



