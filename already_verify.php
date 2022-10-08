<?php 
    include "lib.php";
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users uid='$username' AND active='1'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row){
        $verify = true;
    } else {
        $verify = false;
    }
?>