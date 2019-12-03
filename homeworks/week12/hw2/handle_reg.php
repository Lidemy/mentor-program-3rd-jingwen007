r4<?php
require_once('./conn.php');

$username = $_POST['username'];
$nickname = $_POST['nickname'];
//$nickname = $_COOKIE["nickname"];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);//使用 password_hash 轉換密碼

    $sql = "INSERT INTO `jing_user` (`id`, `username`, `nickname`, `password`) VALUES (NULL, '$username', '$nickname', '$password');"; 
    //echo $sql; // 顯示sql指令
    $result = $conn -> query($sql);//執行sql指令

   if($result) {
      setcookie("nickname",$nickname, time()+3600); //變數為nickname，存活時間一小時(3600秒) 
      setcookie("password",$password, time()+3600); 
      echo "<script>alert('註冊成功');location.href='./login.php';</script>";
    } else {
      echo "<script>alert('註冊失敗');";
      header('Location: ./index.php');
      //  echo "failed," , $conn->error;
    }
?>