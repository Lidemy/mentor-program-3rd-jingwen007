<?php
require_once('./conn.php');

$updatid = $_POST['id'];
$comment = $_POST['comment'];
//UPDATE `meg` SET `comment` = 'dsafADSF\r\nASDFASF\r\nCdddd' WHERE `meg`.`id` = 6;
//UPDATE Person SET FirstName = 'Fred' WHERE LastName = 'Wilson' 

//  $sql = "UPDATE jobs SET title='$title', description='$desc', salary='$salary', link='$link' where id = ".$id;
    $sql = "UPDATE `jing_meg` SET `comment` = '$comment' WHERE `id` = '$updatid'"; 
    echo $sql;
    // echo $sql; // 顯示sql指令
    $result = $conn -> query($sql);//執行sql指令

   if($result>0) {
        echo "<script>alert('更新成功');location.href='./index.php';</script>";
       // header('Location: ./admin.php');
    } else {
        header('Location: ./admin.php');
      //  echo "failed," , $conn->error;
    }
?>