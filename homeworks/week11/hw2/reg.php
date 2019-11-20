<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>會員系統-註冊帳號</title>
</head>
<body>
    <div><h2 style="text-align:center;">註冊帳號</h2></div>
    <h4> ** 本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼  **  </h4>
    <form class="form" action="handle_reg.php" method='POST'>        
        
        <div style="text-align:center;">請輸入您的姓名、帳號及密碼</div>
        <div>姓名：<input type="text" name="username" id="username"></div>
        <div>帳號：<input type="text" name="nickname" id="nickname"></div>
        <div>密碼：<input type="password" name="password" id="password"></div>
        <div><input type="reset" value="重置"><input type="submit" value="確定">
    </form>
    <div style="padding-top: 30px;">
        <div style=""><a href="index.php">回首頁</a> 
        <div style="display: inline-block;;"><a href="reg.php">註冊</a></div>
    </div>
    </div>
</body>
</html>