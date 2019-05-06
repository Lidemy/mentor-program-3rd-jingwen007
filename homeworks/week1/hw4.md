## 跟你朋友介紹 Git

以下適用windows
到https://cmder.net/ 的 Git and others 下載  Git-2.21.0-64-bit.exe 執行安裝

1.$git version：看目前 git 的版本

2.設定你的帳戶，讓 Git 知道這台電腦做的修改要連結到哪一個使用者
(要先在 Github 註冊一個帳號)

 $git config --global user.name "你的帳號"
 $git config --global user.email "你的信箱" 

3.建立一個專案(目錄名稱隨你取，我取hw4)

 $mkdir hw4 //建立一個 hw4 資料夾
 $cd hw4 //移動到 hw4 資料夾
 $git init //對 hw4 做版本控制
 $ls -la //觀看 hw4之下的檔案(含隱藏檔案)
 $會多了一個 .git 的資料夾，這不能刪除，它是用來做版本控制的

4.編輯檔案：vi hw4.txt，編輯完後，按esc 游標跳到最下面,按下 :wq 存檔離開

5.顯示目前工作環境狀態：$git status

$git status //顯示目前工作環境狀態
會顯示
On branch master

No commits yet

Untracked files:
  (use "git add <file>..." to include in what will be committed)

        hw4.txt

nothing added to commit but untracked files present (use "git add" to track)

hw4.txt 還未被追蹤，要用 git add 將未追蹤的檔案加入追蹤


6.$git add hw4.txt //將hw4.txt的檔案加入追蹤，在此按 git add . 也可以，表示全部追蹤

7.$git status //顯示目前工作環境狀態

On branch master

No commits yet

Changes to be committed:
  (use "git rm --cached <file>.

        new file:   hw4.txt

上面表示，已加入追蹤，若檔案有所修改，就會顯示

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

        modified:   hw4.txt


此時，再用 git add hw4.txt ( hw4.txt 加入追蹤)或是 git add . (全部檔案加入追蹤)都可加入追蹤

8.$git commit //建立一個新的版本，打完會進入 vim 模式
進入後，打入你的笑話，打完後，按esc會跳到下面的狀態列，再按(冒號):wq，離開 vim 模式

或是你的笑話比較短，打下面這種的也可以

$git commit -m "打入你要打的訊息" //建立一個新的版本

9.$git log //歷史記錄
 可以看到你的版本號碼，作者，時間(後面兩個要設定才會有喔!)	

10.如果你還有新的笑話要放進去，編輯完後，再用
 $git status  //觀看狀態

會出現下面的訊息告訴你這個 hw4.txt 被改變了

On branch master
Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

        modified:   hw4.txt

no changes added to commit (use "git add" and/or "git commit -a")

如果不要這個笑話，就打 $git checkout hw4.txt ，它就會恢復到你還沒打這笑話之前的狀態
如果你要這個笑話，就要打 $git add hw4.txt ，它就把 hw4.txt 加入加入追蹤

再如上方第 8 點所示，打 $git commit -m "新增笑話1080505"

再用 $git log 觀看，就會看到你之前第一個及第二個版本編號及 commit 訊息


commit 91e2bd76eaa3ca72d75e6fa3d8ab4656bf8dcc13 (HEAD -> master)
Author: jingwen007 <jingmaker007@gmail.com>
Date:   Sun May 5 13:45:49 2019 +0800

    新增笑話1080505

commit 786491efcf8bfc0ecd0e75ee9c42808c9db89bf2
Author: jingwen007 <jingmaker007@gmail.com>
Date:   Sun May 5 13:25:34 2019 +0800

    笑話笑話笑話~



11.如果你不要第二個版本編號的笑話，想恢復成第一個版本
$git check out 786491ef(第一個版本編號的前七碼)

就會回到第一個版本去了

若是後悔了，想回到最新的版本，打 $git checkout master，就能回到最新版本了



12.怎麼放上 Github ?
12.1.到 Github 你的首頁，按下 + 號 ，到 New repository 按下
12.2.出現一個視窗，輸入你的 Respotitory name：hw4
12.3.輸入 Description , Public ,按下 Create repository
12.4.git remote add origin https://github.com/jingwen007/hw4.git 
//加一個遠端的repository ,位置在https://github.com/jingwen007/hw4.git ，代號是origin 
12.5.git push -u origin master // 把我的東西推到 origin 的 master 這個 branch
12.6.去看一下你推上去的 github 網站，已經有 master 及檔案了

13.如何將最新的檔案 push 上去？
13.1.先編輯 hw4.txt並存檔
13.2.$git commit -am "push" //將更變的檔案做 add 及 commit 為 push
13.3.$git push -u origin master //將檔案推到 origin 的 master 這個 branch
13.4.去看一下 Github 的網站， commit 的數字會增加一筆，同時檔案內容也會變更為最新的狀態

14.如何將在 Github 網站上修改的檔案 pull 下來？

14.1.先修改 Github 網站的檔案
14.1.1.進入檔案，按下筆的按鈕
14.1.2.編輯檔案資料，按下下面的 Commit changes (會自動做 Commit，內容為 Update hw4.txt )

14.2.$git pull origin master //將檔案拉下來