<?php
require_once('./conn.php');
$nickname = $_COOKIE["nickname"];
$meg = $_POST['meg'];
echo $meg;

if (empty($nickname) || empty($meg)) {
    //echo "<script>alert('請先登入');";
    echo "<script>alert('請先登入');location.href='./index.php';</script>";
    //header('Location: ./index.php');
    // die('請檢查資料');
    
}
else{
    $sql = "INSERT INTO jing_meg(nickname, comment) VALUES('".$nickname."','".$meg."')";
    echo $sql; // 顯示sql指令
    $result = $conn -> query($sql);//執行sql指令

    if($result) {
         echo "<script>alert('新增成功');location.href='./index.php';</script>";
        //header('Location: ./index.php');
    } else {
        echo "failed," , $conn->error;
    header('Location: ./index.php');
    }
}

?>