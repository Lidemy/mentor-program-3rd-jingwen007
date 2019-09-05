## 什麼是 DOM？
DOM 指 Document Object Model, 就是把一份 HTML 轉換成 Object，而最終會形成一個 DOM 元素的樹狀結構
Javacript 再透過各種指令，針對 DOM 元素進而使改變

## 事件傳遞機制的順序是什麼；
事件傳遞機制的順序先補獲，再冒泡。從上面傳下來，再從下面傳回去。

## 什麼是冒泡，什麼又是捕獲？
捕獲就先由最外層(父層)開始，而冒泡的順序則相反。理由是這邊會先執行捕獲再來才是冒泡。


## 什麼是 event delegation，為什麼我們需要它？
思考：如果有 100 個按鈕，是否要幫這 100 個按鈕加上 eventListener？
若是有 1000 個按鈕，是否要幫這 1000 也加上 eventListener？

因為這樣是很沒有效率的，我們不可能為每一個按鈕都一個專屬的 eventListener
所以需回想起事件捕捉及冒泡的印象，事件是會冒泡到上層元素，
所以每一個button的clickEvent都會冒泡到類別名稱為outer上面去，
故而在 outer 上面加 eventListener就好了，就可以處理它下面所有的 button。

而且動態新增的也可以，因為 eventListener 本來就放在 outer 上面，
而不是放在新增的上面，這個就叫做 Event Delegation (事件代理) 。


## event.preventDefault()跟event.stopPropagation()差在哪裡，可以舉個範例嗎？

  - event.preventDefault 會阻止瀏覽器預設行為。
例如：在表單中，可加入一個按鈕 Submit，在表單送出以前，就會觸發這個事件。
我們可以對這事件做一些處理，加入 event.preventDefault()，不要讓它送出之類的。
通常用於表單驗證之類。


  - stopPropagation，阻止事件繼續傳遞下去。
捕獲跟冒泡的機制，就有點像是逐級往上層層回報的意思，
有時候不想要再往上層回報，只要自己接收到這個事件就好了，不想讓它繼續往上冒泡，
而讓事件傳遞下去時，就可以 call 這個 function 來停止
這樣在捕獲階段就被停止，所以按任何按鈕都沒有反應了。