## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。


## 請問什麼是盒模型（box modal）

<blockquote> 標籤定義塊引用。

<blockquote> 與</blockquote> 之間的所有文本都會從常規文本中分離出來，經常會在左、右兩邊進行縮進（增加外邊距），
而且有時會使用斜體。也就是說，塊引用擁有它們自己的空間。

<canvas> 標籤定義圖形，比如圖表和其他圖像。

<embed> 標籤定義嵌入的內容，比如插件。

## 請問 display: inline, block 跟 inline-block 的差別是什麼？

每個box modal有四個邊：margin, border, padding與content。
因為在設定這四個邊的長度與寬度會比較不容易計算

所以通常會用 box-sizing:border-box，好使全部的寬度就等於width(height)
而免於比較複雜的計算

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

inline：設定 inline 的元素可排在一起，也無法設定寬、高，例如 <span>, <a>

block：設定 block 的元素都可以調寬高、padding,margin,width, height，皆可調
每個元素也會佔據一整行，例：<div> 、 <p> 、 <h1> 、 <h2>

inline-block：對外可並排，不會換行，對內可設寬高、padding、 margin

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

static：網頁預設的排版方式
fixed：相對於對瀏覽器做定位，定位好，無論瀏覽器的捲軸如何移動，就是會一直在瀏覽器的固定位置了
relative(相對定位)：和static有點類似，但可做位移的設定，也會給 absolute 當定位的參考點 
absolute (絕對定位)：會去找 relative 做參考點當定位，所以在上一層就需要設定好 relative，
否則會一直往上找，甚至找到瀏覽器去