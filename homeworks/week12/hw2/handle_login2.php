<?php
require_once('./conn.php');

$nickname = $_POST['nickname'];
$password = $_POST['password'];
if(!empty($nickname)) {
    
    
    $sqlrandomPass = "SELECT password FROM jing_user WHERE nickname = '".$nickname."'";
    echo $sqlrandomPass;
    $resultrandomPass = $conn -> query($sqlrandomPass);//執行sql指令
    
    /*
    $stmt = $conn -> prepare("SELECT * FROM jing_user where nickname = ?  and password = ?");
    $stmt->bind_param("ss", $nickname, $password);
    $stmt->execute();
    $resultstmt = $stmt->get_result();
    var_dump($resultstmt);
    */
    if($resultrandomPass -> num_rows > 0){ 
       while($row = $resultrandomPass-> fetch_assoc()) {
            //setcookie("nickname",$nickname, time()+3600); 
              $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if (password_verify($password, $hash)) {
            $count=10;
            $sqlCheck = "SELECT distinct(c_nickname) FROM (jing_users_certificate,jing_user) WHERE `nickname` = '".$nickname."'";
            $resultCheck = $conn -> query($sqlCheck);//執行sql指令
            $randoma = '';

            if($resultCheck -> num_rows > 0) {
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
                //echo $_COOKIE["nickname"];
                setcookie("randomPass",$randomPass, time()+3600);  
                //echo $_COOKIE["randomPass"];
                echo "<script>alert('登入成功');location.href='./index.php';</script>";

                setcookie("randomPass",$randomPass, time()+3600);  
                //echo $_COOKIE["randomPass"];
            }
           if(!$resultRandom){
                setcookie("nickname",$nickname, time()+3600);  
                echo $_COOKIE["nickname"];
                setcookie("randoma",$randoma, time()+3600);  
                echo $_COOKIE["randoma"];
                // echo "<script>alert('登入成功');location.href='./index.php';</script>";
            }    
            }
        }           
    }else {
        echo "<script>alert('您的帳號或密碼有錯誤，請重新輸入');location.href='./login.php';</script>";

    }
}
else{
    echo "<script>alert('您的帳號或密碼有錯誤，請重新輸入');location.href='./login.php';</script>";

}
    
?>