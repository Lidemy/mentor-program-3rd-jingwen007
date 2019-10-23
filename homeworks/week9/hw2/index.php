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
        <div class="login">
            <a href="logout.php">
            <?php 
                if(!isset($_COOKIE["nickname"])){
                    echo "<a href='reg.php'>註冊</a>"; 
                }else{
                    echo "<a href='logout.php'>登出</a>";
                }?>
                 / 
            <?php 
                if(isset($_COOKIE["nickname"])){
                   echo $_COOKIE["nickname"]; 
                }
                else{
                    echo "<a href='login.php'>登入</a>";
                }
            ?></div>
            
        <h1> 留言版 </h1>  
        <h4>** 本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼  ** </h4>
        <div class="authorData">
            <div class="authorImg">
                <img src="authorImg.jpg" alt="大頭">
            </div>
            <div class="author">
            <?php 
                if(isset($_COOKIE["nickname"]))
                {
                    echo $_COOKIE["nickname"]; 
                }else{
                    echo "匿名";

                }
            ?>
            </div>
            <div class="level">
                iT邦新手5級
            </div>
            <div class="message">
                <img src="features.jpg" alt="">
                <form action="./handle_add.php" method="POST">
                    <textarea name="meg" id="meg" cols="90" rows="10" placeholder="留言"></textarea>
                    <input type="submit" class="btn" value="留言">
                </form>                      
            </div>    
        </div>
        
        <div class="reply">
        <?php
        $count = 1;
        
        //求編號
        $sqlCount = 'SELECT COUNT(comment) as count FROM jing_meg';
        $reResult = $conn->query($sqlCount);
        if($reResult) {              
            while($rowCount = $reResult -> fetch_assoc()) {
                $count = $rowCount['count'];
            }  
        }
       
        //echo "總數".$reCount;
        //輸出留言資料
        $sql = 'SELECT * from jing_meg ORDER BY created_at DESC LIMIT 50';//以降冪排列
        $result = $conn->query($sql);//執行SQL
        if($result) {  
                      
            while($row = $result -> fetch_assoc()) {
                $count;  
                ?>
                <div class = 'reBox'>
                <div style="vertical-align: top;"><?php echo $count; ?></div>
                <img src='authorImg.jpg' alt='大頭'>
                <div class='reName'><?php echo $row['nickname']; ?></div>
                <div class='reLevel'>iT邦新手5級</div>
                <div class='reTime'><?php echo $row['created_at']; ?></div>
                <div class='reMeg'><?php echo $row['comment']; ?></div>
                <?php 
                if(isset($_COOKIE["nickname"])){
                    if(($_COOKIE["nickname"]) == $row['nickname'])
                    {
                        ?>
                    <form action="admin.php" method='POST'>
                        <input type="hidden" name="allid" value="<?php echo $count; ?>">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="nickname" value="<?php echo  $_COOKIE['nickname']; ?>">
                        <input type="hidden" name="password" value="<?php echo  $_COOKIE['password']; ?>">
                        <div style="text-align:right"><input class="updateBtn" type="submit" value="更新"></div>
                    </form>    
                    <?php                   
                    }    
                }else{}
                    ?>
                
                </div>

                <?php $count--;      
            }
        }
        ?>     
        </div>          
    </div>
  
</body>
</html>
