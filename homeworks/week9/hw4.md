## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
- VARCHAR：可變動字串，會依實際長度儲存，最大長度是65,535位元組，能有預設值
- TEXT：可變動字串，長度設定多少就儲存多少，合用在文字量多的欄位 ，最大長度是65,535位元組，不能有預設值
查詢速度： VARCHAR > TEXT



## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
- Cookie 是什麼？
Cookie 是用於儲存使用者在瀏覽器的記錄，例如個人資訊(帳號、密碼)、瀏覽記錄、購物商品記錄。

- 在HTTP 這一層要怎麼設定Cookie，瀏覽器又會以什麼形式帶去Server？


當 Client 端使用 HTTP 通訊協定向伺服器提出瀏覽請求後，如果需要存取 Cookie 資料，Server 回應 Client 端請求的 HTTP 標題資訊，
就會包含 Cookie 資料，如下所示：
> Set-Cookie:name=value;expires=date;path=pname;domin=dname;secure

- name 屬性：Cookie 名稱，可以使用此名稱取出 Cookie 值和刪除 Cookie
- expires 屬性：此為選項，可有可無，expries 指定 Cookie 值和刪除 Cookie 的有效期限，使用的是 GMT 時間，其格式如下所示：
  - Weekday, DD-MM-YY HH:MM:SS GMT
- domain 屬性：伺服器的網域名稱，預設是建立 Cookie 的伺服器網域名稱。
- path 屬性：在 domain 屬性下的路徑名稱，此屬性和 domain 屬性主要是為了區分 Cookie 是哪一個網站建立，path 屬性可以進一步
  在同一個網站分辨是郡一頁網頁建立的 Cookies。
- secure 屬性：如果指定此屬性，表示 Cookie 需要在保密情況下，才能在客戶端和伺服端之間傳送。

這題不了解，所以查了手上的一本書 (PHP7 + MySQL +AJAX 網頁設計範例教本第五版-陳會安))




## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
1. 密碼沒有加密，易有資安上易被侵入或盜取問題
2. 由於 Cookie 是儲存在 Client 端，易被有心人士盜取



