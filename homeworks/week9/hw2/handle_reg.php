<?php
require_once('./conn.php');

$username = $_POST['username'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];
//UPDATE `meg` SET `comment` = 'dsafADSF\r\nASDFASF\r\nCdddd' WHERE `meg`.`id` = 6;
//UPDATE Person SET FirstName = 'Fred' WHERE LastName = 'Wilson' 

//  $sql = "UPDATE jobs SET title='$title', description='$desc', salary='$salary', link='$link' where id = ".$id;
    $sql = "INSERT INTO `jing_user` (`uid`, `username`, `nickname`, `password`) VALUES (NULL, '$username', '$nickname', '$password');"; 
    echo $sql;
    // echo $sql; // 顯示sql指令
    $result = $conn -> query($sql);//執行sql指令

   if($result) {
    setcookie("nickname",$nickname, time()+3600); //變數為nickname，存活時間一小時(3600秒) 
    setcookie("password",$password, time()+3600); 
    echo "<script>alert('註冊成功');location.href='./index.php';</script>";
       // header('Location: ./admin.php');
    } else {
     header('Location: ./admin.php');
      //  echo "failed," , $conn->error;
    }
?>