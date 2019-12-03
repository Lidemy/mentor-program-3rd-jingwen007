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

        $sql = 'SELECT * from jing_meg WHERE reply_megid = 0 ORDER BY created_at DESC ';//以降冪排列        
        //echo $sql."<br />";
        $result = $conn->query($sql);//執行SQL
        $total = mysqli_num_rows($result); //總比數
        $per = 20; //每頁顯示20筆
        $pages = ceil($total/$per); //一共幾頁

        if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
            $page=1; //則在此設定起始頁數
        } else {
            $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
        }


        $start = ($page-1)*$per; //每一頁開始的資料序號
        //echo "每一頁開始的資料序號".$start."<br />";
        $sql = $sql.' LIMIT '.$start.', '.$per;
         //echo $sql;
        $result1 = mysqli_query($conn,$sql) or die("Error");
        


        if($result1) {  
                      
            while($row = $result1 -> fetch_assoc()) {
                $count;  
                ?>
                <div class = 'reBox'>
                    <div style="vertical-align: top;">No.<?php echo $row['id']; ?></div>
                    <img src='authorImg.jpg' alt='大頭'>
                    <div class='reName'><?php echo $row['nickname']; ?></div>
                    <div class='reLevel'>iT邦新手5級</div>
                    <div class='reTime'><?php echo $row['created_at']; ?></div>               
                    <div class='reMeg'> <? echo htmlspecialchars($row['comment'], ENT_QUOTES, 'utf-8')?></div>
                    <?php 
                            $reply__sql = 'SELECT * FROM jing_meg WHERE reply_megid = '.$row['id']. ' AND reply_megid != 0'; 

                            //echo  $reply__sql;
                            $replay__result = mysqli_query($conn,$reply__sql) or die("Error");
                            if($replay__result) {  
                      
                            while($replay__row = $replay__result -> fetch_assoc()) {
                    ?>

                    <div class='reply__meg' <?php 
                    if($replay__row['nickname'] == $row['nickname'])
                    { 
                        echo "style='background-color:#b5caf959;'";
                    }?>>
                        <img src='authorImg.jpg' alt='大頭'>
                        <div class='reply__reName'><?php echo $replay__row['nickname']; ?></div>
                        <div class='reply__reLevel'>iT邦新手5級</div>
                        <div class='reply__reTime'><?php echo $replay__row['created_at']; ?></div>                           
                        <div class='reply__reMeg'> <? echo htmlspecialchars($replay__row['comment'], ENT_QUOTES, 'utf-8')?></div>
                            
                    </div>  <!-- reply__meg end -->

                    <?php 
                    if(isset($_COOKIE["nickname"])){
                        if(($_COOKIE["nickname"]) == $row['nickname'])
                        {
                            ?>
                        <form action="admin.php" method='POST'>
                            <input type="hidden" name="allid" value="<?php echo $total; ?>">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="nickname" value="<?php echo  $_COOKIE['nickname']; ?>">
                            <input type="hidden" name="password" value="<?php echo  $_COOKIE['password']; ?>">
                       
                        </form>   
                         
                        <?php                   
                        }    
                    }else{}
                    ?>                
                    <?php }?>
                        <form action="./handle_addsub.php" method="POST">
                            <textarea name="meg" id="meg" cols="90" rows="10" placeholder="留言"></textarea>
                            <input type="submit" class="btn" value="新增子留言">
                            <input type="hidden" name="allid" value="<?php echo $total; ?>">
                            <input type="hidden" name="subid" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="nickname" value="<?php echo  $_COOKIE['nickname']; ?>">
                            <input type="hidden" name="password" value="<?php echo  $_COOKIE['password']; ?>">
                        </form>     
                        <?php } ?>
                            
                </div>  <!-- reBox end  -->
                    <?php $total--;      
                }
            }
            ?>     
    <div class="ct"><?php
    //分頁頁碼

    echo "<a href=?page=1>第一頁</a>   ";
    for( $i=1 ; $i<=$pages ; $i++ ) {
        if ($i == $page) {
            echo "<div style='font-size:20px;color:red;display:inline;'> $i </div>"; 
        }            
        else { 
            echo "<a href=?page=".$i.">".$i."</a> ";
        }
    } 
    echo "<a href=?page=".$pages.">最後一頁</a><br /><br />";
    ?>
    </div>
        </div> 
         
    </div>
  
</body>
</html>
