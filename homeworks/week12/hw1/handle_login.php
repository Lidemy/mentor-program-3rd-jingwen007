<?php
require_once('./conn.php');
$nickname = $_POST['nickname'];
//
$password = $_POST['password'];//使用 password_hash 轉換密碼
if(isset($_POST['id'])){
    $id = $_POST['id'];  
    setcookie("id",$id, time()+3600);   
}

    echo "<br />";
    $sql = "SELECT * From jing_user WHERE `nickname` = '$nickname'  AND `password` = '$password';";
    echo $sql."<br />";
    $stmt = $conn -> prepare("SELECT * FROM jing_user where nickname = ?  and password = ?");
    $stmt->bind_param("ss", $nickname, $password);//s是string ，因為上面有兩個(username, password)
    $stmt->execute();//執行指令
    echo mysqli_error($conn);//可印出錯誤訊息來察看
    $result = $stmt->get_result();

    $sqlCount = "SELECT COUNT(comment) as count FROM jing_meg WHERE '$nickname' = `nickname`";
    echo $sqlCount; 
    
    $sqlPassword = "SELECT * From jing_user WHERE `nickname` = '$nickname'";
    echo $sqlPassword;
    $resultPwd = $conn -> query($sqlPassword);//執行sql指令

    if($resultPwd -> num_rows > 0) {
        
        while($rowpwd = $resultPwd -> fetch_assoc()) {
            
            $hash = $rowpwd['password'];
            echo "<br />";
            echo "密碼:".$hash."<br />";
            if (password_verify($password, $hash)) {
                $count=10;
            //FOR回圈以$random為判斷執行次數
            $sqlRandom = "SELECT jing_users_certificate.c_username FROM (jing_users_certificate,jing_user) WHERE  $nickname = `jing_user.nickname`";
            echo $sqlRandom;
            $resultRandom = $conn -> query($sqlRandom);//執行sql指令
            $randoma = '';
            if($resultRandom -> num_rows < 0) {
                
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
                    //使用$randoma連接$b
                    $randoma = $randoma.$b;
                    echo '亂碼：'.$randoma;
                }        

            }
            //輸出$randoma每次更新網頁你會發現，亂數重新產生了
                $sql = "INSERT INTO jing_users_certificate(c_id, c_username) VALUES('$randoma','$nickname')";
                // echo $sql; // 顯示sql指令
                $result = $conn -> query($sql);//執行sql指令
                setcookie("id",$rowpwd['id'], time()+3600);   
                setcookie("nickname",$nickname, time()+3600);                  
                //echo "<script>alert('登入成功');location.href='./index.php';</script>";
            }  
        }
    } else {
        echo "<script>alert('您的帳號或密碼有錯誤，請重新輸入');location.href='./index.php';</script>";
    }
           

   /********************************************************************************************************************/ 
   /*
   if($result -> num_rows > 0) {
       $row = $result -> fetch_assoc();
       setcookie("id",$row['id'], time()+3600);   
       setcookie("nickname",$nickname, time()+3600);  
        echo "<script>alert('登入成功');location.href='./index.php';</script>";
 
       
       echo $row['username'];  
        //header('Location: index.php');   
    //    }
    } else {
        //echo "failed," , $conn->error;
        echo "<script>alert('您的帳號或密碼有錯誤，請重新輸入dfccccccccc');location.href='./index.php';</script>";
        header('Location: ./index.php');
    }
    */
    /********************************************************************************************************************/ 
// }   
?>