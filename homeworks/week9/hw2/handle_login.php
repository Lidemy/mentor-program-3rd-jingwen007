<?php
require_once('./conn.php');
// echo $_POST['id'];
$nickname = $_POST['nickname'];
setcookie("nickname",$nickname, time()+3600);  
$password = $_POST['password'];
if(isset($_POST['id'])){
    $id = $_POST['id'];  
    setcookie("id",$id, time()+3600);   
}


//echo $nickname;
setcookie("nickname",$nickname, time()+3600); //變數為nickname，存活時間一小時(3600秒) 
//echo $_COOKIE['nickname'];

if (empty($nickname) || empty($password)) {
    echo "<script>alert('您的帳號或密碼有錯誤，請重新輸入');location.href='./login.php';</script>";
}
else{
    $sql = "SELECT * From jing_user WHERE `nickname` = '$nickname' AND `password` = '$password';";
    $sqlCount = "SELECT COUNT(comment) as count FROM jing_meg WHERE '$nickname' = `nickname`";
   // echo $sql."<br />";
    $result = $conn -> query($sql);//執行sql指令

   if($result) {
       while($row = $result -> fetch_assoc()) {
            setcookie("id",$row['id'], time()+3600);
            echo "<script>alert('登入成功');location.href='./index.php';</script>";
       }
    } else {
        //echo "failed," , $conn->error;
        echo "<script>alert('您的帳號或密碼有錯誤，請重新輸入');location.href='./index.php';</script>";
        //header('Location: ./index.php');
    }
}   
?>