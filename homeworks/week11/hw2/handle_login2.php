<?php
require_once('./conn.php');

$nickname = $_POST['nickname'];
$password = $_POST['password'];
if(isset($nickname)) {
    $sqlrandomPass = "SELECT  `c_id` FROM `jing_user`,`jing_users_certificate` WHERE `c_nickname` = '".$nickname."'";
    $resultrandomPass = $conn -> query($sqlrandomPass);//執行sql指令
    echo "暱稱:".$nickname;
    setcookie("nickname",$nickname, time()+3600);  
    echo "<script>alert('登入成功');location.href='./index.php';</script>";
    echo "<br />";
    if(!$resultrandomPass) {
    $randomPass = $_COOKIE["randomPass"];
    } else{ 
    
    //設定亂數通行證
    $count=10;
    $randomPass = '';
    for ($i = 1 ;$i <= $count ;$i = $i+1) {
        //亂數$c設定三種亂數資料格式大寫、小寫、數字，隨機產生
        $c = rand(1,3);
        //在$c==1的情況下，設定$a亂數取值為97-122之間，並用chr()將數值轉變為對應英文，儲存在$b
        if($c == 1) {
            $a = rand(97,122);
            $b = chr($a);
        }
        //在$c==2的情況下，設定$a亂數取值為65-90之間，並用chr()將數值轉變為對應英文，儲存在$b
        if($c == 2) {
            $a = rand(65,90);
            $b = chr($a);
        }
        //在$c==3的情況下，設定$b亂數取值為0-9之間的數字
        if($c == 3) {
            $b = rand(0,9);
        }
        //使用$randomPass$b
        $randomPass = $randomPass.$b;
        //echo '亂碼：'.$randomPass;
    }        
    echo '亂碼：'.$randomPass;

    //新增亂碼到 jing_users_certificate 資料表內，以做為判斷
    $sqlRandom = "INSERT INTO jing_users_certificate(c_id, c_nickname) VALUES('".$randomPass."','".$nickname."')";
    // echo $sql; // 顯示sql指令
    $resultRandom = $conn -> query($sqlRandom);//執行sql指令 
    setcookie("nickname",$nickname, time()+3600);  
    echo $_COOKIE["nickname"];
    setcookie("randomPass",$randomPass, time()+3600);  
    echo $_COOKIE["randomPass"];
    echo "<script>alert('登入成功');location.href='./index.php';</script>";

    setcookie("randomPass",$randomPass, time()+3600);  
    echo $_COOKIE["randomPass"];
}

}
    
?>