<?php
/*登出*/
    //echo "dfsfsaf";
    setcookie("nickname","",time()-3600); //變數為test，變數值為Good_Idea，存活時間一小時(3600秒) 
    echo "<script>alert('登出成功');location.href='./index.php';</script>";
?>
    
    

