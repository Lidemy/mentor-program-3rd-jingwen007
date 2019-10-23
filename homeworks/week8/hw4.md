## 什麼是 Ajax？
以前透過表單來交換資訊的方式有一個缺點，就是每一次都要換頁。
每一次和Server要資料時，都一定要換頁。
可是有時你只是想要由 Server 拿一些資料，它是有些畫面有改變而已，不需要整個畫面都變動。
這個時候我們可以利用 JavaScript 發一個 request 到 Server，然後得到我們要的資料，這樣即可不用換頁。

## 用 Ajax 與我們用表單送出資料的差別在哪？
從瀏覽器上，發一個 request給 srever ，然後 server 回傳 response 的時侯，
會回傳給 JavaScript，所不是回傳給瀏覽器，它一樣會回傳給瀏覽器，但瀏覽器會把結果，轉傳到 JavaScript上面，
這和我們原本所講的表單不同，原本的表單是會換頁，用表單提交一份資料之後，就直接送 response 到瀏覽器，瀏覽器就會 Rendering 這個新的結果。

現在用 AJAX，Server就把 response 結果直接給 Javascript
差異在於換頁，表單的方式是瀏覽器得到一個 response 之後就 render 出來，
於是就需要換頁，而 AJAX 的方式，則是 response 會直接 交給 JS。


## JSONP 是什麼？
是資料格式 JSON 的一種“使用模式”，可以讓網頁從別的網域要資料

資料來源：https://zh.wikipedia.org/wiki/JSONP

## 要如何存取跨網域的 API？
想要跨來源存取的話，在  Request  裡要加上一個 Header，
 access-control-allow-origin:*
這裡面的內容就可以寫，哪些來源的人可以存取這個 API 的 response ，這來源其實就是在發 Request 的時侯，
瀏覽器就會在 Request 的header裡面加上一個 header叫作 origin，而 origin 裡放的是來源，
例如想連到 Googole，就是 origin:google.com ，Server 就會根據這個來源，來決定要不要給它存取的權限

## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？
因為第四週是用 node.js 來發送請求，它沒有限制。
而這週是用瀏覽器，瀏覽器為了安全性考慮，會加上同源政策的限制，
若想要跨來源存取，要加上 access-control-allow-origin 這個 header就可以解決這個問題
