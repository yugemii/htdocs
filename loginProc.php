<?
    include "lib.php";

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $uid = mysqli_real_escape_string($conn, $uid);
    $pwd = mysqli_real_escape_string($conn, $pwd);

    $query = "SELECT * FROM users WHERE uid='$uid' and pwd=password('$pwd')";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if($row){
        $_SESSION['isLogin'] = time(); 
?>
    <script> location.href="index.php"; </script>

    <?  } 
    else 
    {
        echo "로그인 정보가 올바르지 않습니다.";
    }