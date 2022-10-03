<?php
    $conn = mysqli_connect('localhost', 'root', '990820', 'web');
    $sql = "SELECT * FROM topics"; //SELECT문의 위험요소는 모든 데이터를 가져올 수도 있으므로 제한을 걸어야함.

    $result = mysqli_query($conn, $sql);
    //결과의 자릿수를 이용하여 데이터를 가져올 수 있음. 칼럼의 이름을 이용하여 데이터를 가져올 수 있음. 연관 배열(칼럼명 사용하는)이 좋음.
    //mysqli_fetch_array() 는 $result 의 결과물을 하나씩 하나씩 리턴하는 특징을 가지고 있음.

    while( $row = mysqli_fetch_array($result)){
        echo '<h2>'.$row['title'].'</h2>';
        echo $row['description'];
    }
?>