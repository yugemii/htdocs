<?php
    // include "already_verify.php";
    include "lib.php";
    include "class.phpmailer.php";
    
    $username = $_SESSTION['username'];

    $sql = "SELECT * FROM users WHERE uid='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if($row){
        $email = $row['email'];
        $hash = $row['hash'];
    }

    $mail = new PHPMailer(true); //객체 생성함.
    $mail->IsSMTP(); //smtp 방식으로 사용할 것을 알려줌.
    
    try {
      $mail->Host       = "smtp.gmail.com";
      $mail->SMTPDebug  = 2;//0~5, 0:no debug
      $mail->SMTPAuth   = true; //smtp 인증 사용
      $mail->Port       = 465;//cafe24 Port 587
      $mail->SMTPSecure = "ssl";
      $mail->Username   = "uksohun1@gmail.com";
      $mail->Password   = "knj160346125!";
      $mail->AddAddress('study070@naver.com', 'study070');
      $mail->SetFrom('uksohun1@gmail.com', '이유경'); // 이메일 보내는 사람에 기록됨.
      $mail->AddReplyTo('uksohun1@gmail.com', '이유경'); //받은 사람이 답장했을 때 자동 기입
      $mail->Subject = '메일 인증';
      //$mail->MsgHTML(file_get_contents('contents.html'));
      $mail->MsgHTML("Email verify! http://127.0.0.1/verify.php?email=".$email."&hash=".$hash);

      $mail->Send();
      echo "Message Sent OK</p>\n";
    } catch (phpmailerException $e) {
      echo $e->errorMessage();
    } catch (Exception $e) {
      echo $e->getMessage();
    }

?>