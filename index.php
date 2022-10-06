<?
    include "lib.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <title>환영해요, 유개미의 숲</title>
    </head>
    <body>
        <header>
            <h1><a href="index.php">환영해요, 보안의 숲</a></h1>
            <div class="button">
                <button>로그인</button>
                <button>회원가입</button>
            </div>
        </header>
        <session id = "main">
        <pre>
        환영해요, 보안의 숲
                
        관리자 깃 허브 주소 : <a href="https://github.com/yugemii">https://github.com/yugemii</a>
        관리자 티스토리 주소 : <a href="https://uksohun1.tistory.com">https://uksohun1.tistory.com</a>

        <a href="menu1.php"><button>웹 해킹 게시판</button></a>
        <a href="menu2.php"><button>시스템 해킹 게시판</button></a>
        
        <div id="search_box">
        <form action="" method="get">
            <select name="catgo">
                <option value="title">제목</option>
                <option value="title">글쓴이</option>
                <option value="title">내용</option>
            </select>
            <input type="text" name="search" size="40" required="required"><button>검색</button>
        </form>
        </div>
        </pre>
        </session>
    </body>
</html>