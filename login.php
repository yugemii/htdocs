

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/login.css">
        <title>이유경의 웹 사이트</title>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gugi&family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1 class="site_name"><a href="index.php">이유경의 웹 사이트</a></h1>
        </header>
        <session id = "main">
            <nav class = "menu">
                <ul class="list">
                    <li><h2>메뉴</h2></li>
                    <li><a href="menu1.php">웹 해킹</a></li>
                    <li><a href="menu2.php">시스템 해킹</a></li>
                </ul>
            </nav>
            <div class = "board">
            <?php
                session_start();

                $conn = mysqli_connect('localhost', 'root', '990820', 'register');

                $input_id=$_POST['id'];
                $input_pw=$_POST['pw'];

                //아이디가 있는지 검사하는 기능
                $sql = "SELECT * FROM tb_user WHERE userid='$input_id'";
                $result = $conn -> query($sql);

                //아이디가 있으면 비밀번호를 검사함.
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result);

                    //비밀번호가 맞으면 세션을 생성함.
                    if($row['userpw'] == $input_pw) {
                        $_SESSION['userid']=$input_id;
                        if(isset($_SESSION['userid'])){
                            echo "로그인 성공!</br>";
                            echo $_SESSION['userid']."님 환영합니다</br>";
                        } else {
                            echo "로그인 실패!";
                        }
                    } else {
                        echo "로그인 정보가 잘못되었습니다.";
                    }
                } else {
                    echo "로그인 정보가 잘못되었습니다.";
                }
            ?>
            </div>
        </session>
        <footer>
            <address>광주광역시 동구 필문대로 309 조선대학교 컴퓨터공학과 재학</address>
        </footer>
        <script src="js/login.js"></script>
    </body>
</html>