<?php require_once('./conn.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="wrap">
    <div style="text-align:center;font-size:20px;">
    <?php 
       if(!empty($_POST["nickname"])){
           $nickname = $_POST["nickname"];//全部留言資料的id
       } 
  
       if(!empty($_POST["allid"])){
           $allmeg_id = $_POST["allid"];//全部留言資料的id
       } 
       
       if(!empty($_POST["id"])){
           $updatemeg_id = $_POST["id"];//需更改留言資料的id
        //    echo "需更新的留言 id 數：".$allmeg_id."<br>";
       }    
       
    //    echo " hi! ".$_COOKIE["nickname"]."，您好<br/>您將修改桔色虛線範圍留言資訊";

   ?>    </div>
        <div class="login"><a href="logout.php">登出 </a> / <a href="member.php"><?php echo $nickname?></a></div>
        <h1>更新資料</h1>
        <h4> 本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼 </h4>
        <div>        
        <?php
        $count = 1;
        
        //求編號
        $sqlCount = "SELECT COUNT(comment) as count FROM jing_meg WHERE '$nickname' = `nickname`";
        $reResult = $conn->query($sqlCount);
        if($reResult) {              
            while($rowCount = $reResult -> fetch_assoc()) {
                $count = $rowCount['count'];
            }  
        }
        //求留言資料，只顯示登入帳號的留言
        $sql = "SELECT * from jing_meg WHERE '$nickname' = `nickname` ORDER BY created_at  DESC LIMIT 50";//以降冪排列
        //echo $sql;
        $result = $conn->query($sql);//執行SQL
        if($result) {                        
            while($row = $result -> fetch_assoc()){                 
            if($updatemeg_id == $row['id']){?>
            <div class = 'updateBox' style='border:2px dotted #FFC107;'>
            <?php
            }else{
            ?>
            <div class = 'updateBox'>
            <?php } ?>
            <form action="handle_update.php" method="post">
                <div><?php echo $count;?></div>
                
                <img src='authorImg.jpg' alt='大頭'>
                <div class='reName'><?php echo $row['nickname'];?></div>
                <div class='updateLevel'>iT邦新手5級</div>
                <div class='updateTime'><?php echo $row['created_at'];?></div>
                <div class='updateMeg'><textarea name="comment" cols="65" rows="5"><?php echo $row['comment'];?></textarea></div>
                <div style="text-align:center"><input type="reset" value="重置"><input type="submit" value="更新"></div>
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>" />
            </form>
                
            </div>
            <?php $count--;      
                }
            }
        ?>           <div class="goHome"><a style="" href="index.php">回首頁</a></div>
        </div>          
    </div>
</body>
</html>
