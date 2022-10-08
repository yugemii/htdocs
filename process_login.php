<?php
    include "already_login.php";
    include "lib.php";

    if ( $login ) {
        header('Location: board.php');
    }

    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM users WHERE uid='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
    if(isset($row)){
         $db_pwd = $row['pwd'];
         if(password_verify($password, $db_pwd)) {
            session_start();
            $_SESSION['username'] = $username;
            echo "<script>location.href='board.php';</script>";
         } else {
            $wp = 1;
         }
    } else {
       $wu = 1;
    }
?>