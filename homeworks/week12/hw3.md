## 請說明 SQL Injection 的攻擊原理以及防範方法

攻擊者能夠由 SQL 注入（Inject）一些東西，執行他想要的結果
如：登入、查詢、新增、修改、刪除等功能，例如，在username輸入：’ or 1=1 --’
即可直接登入網站

**解決方法：prepare statement**
在本來放變數的地方，改成問號
$stmt = $conn -> prepare(“SELECT * FROM users where username=?  and password=?”) ;
$stmt->bind_param(“ss”, $username, $password);
$stmt->execute();
$result = $stmt->get_result();
//s是string ，因為上面有兩個(username, password)



## 請說明 XSS 的攻擊原理以及防範方法

一般而言會在留言版中的 html 是 textarea 的內容裡，
輸入 Html 的標鑯，如：<h1>test</h1>，或是 JavaScript 的程式碼
如：<script>window.location="https://google.com"</script>
能執行 JavaScript 就表示任何人都可以放他想放的 JavaScript 在你的網站裡，
如
1. 竄改頁面
2. 竄改連結
3. 偷 Cookie

**解決方法：escape，跳脫**
echo htmlspecialchars($str, ENT_QUOTES, ‘utf-8’)


## 請說明 CSRF 的攻擊原理以及防範方法

CSRF 全稱是 Cross Site Request Forgery，就是在不同的 domain 底下卻能夠偽造出「使用者本人發出的 request」
因為瀏覽器的機制，只要發送 request 給某個網域，就會把關聯的 cookie 一起帶上去。

如果使用者是登入狀態，那這個 request 就包含了他的資訊（例如說 session id），
這 request 看起來就像是使用者本人發出的。

可能會造成不小心把自己的資料刪除或修改或是更甚者，會造成自己銀行帳號轉出金額的情況


**防範方法**
<li>**使用者的防禦**
1. 每次登入後，離開前要記得登出
2. 關閉執行 js 或把會造成威脅的程式碼過濾掉不要執行

<li>**Server 的防禦**
思考如何檔掉從別的 domain 來的 request

<li>**檢查 Referer**
檢查 header 有一個自動帶來的一個欄位 referer，代表 referer 是從哪邊來的，是否合法，若不是則直接 reject 即可
但此方式有三個要注意的地方：
1.有些瀏覽器不會帶 referer
2.有的使用者會關掉 referer，此時，你的 server 就會 reject 掉使用者發出的 request
3.判是你是否合法的 domain 的程式碼，必須保證沒有 bug


<li>**加上圖形驗證碼、簡訊驗證碼**
多一道檢查，可以避免被攻擊


參考：https://blog.techbridge.cc/2017/02/25/csrf-introduction/
