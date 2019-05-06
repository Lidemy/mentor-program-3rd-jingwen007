## 交作業流程

一、 

老師會給一個classroom的連結，按下接受，會產生 Lidemy/mentor-program-3rd-jingwen007，
按下綠色按鈕 Clone or download，複製網址，到 CLI ，輸入git clone 網址，按下 Enter。
跑完後，再切進mentor-program-3rd-jingwen007目錄裡面，以後都在這個目錄裡寫作業
先執行 npm install 

二、

1. 開一個新的branch名稱為week1：git branch week1
2. 切換到week1:git checkout  week1(切保自己在week1分支)
3. 編輯作業：用vim或其他編輯系統
4. 做commit:git commit -am "hw1"
5. eslint 檢查js程式碼
6. 把作業放到github：git push origin week1
7. 到github網站，在week1的右側，按下Compare & pull request
8. 打上標題：Week1作業，下面寫心得或其他的問題後，按下
Creat pull request
9. 複製網址，到第三期作交作業網址
10. 到issues，開一個New issue
11. 標題有規範，要打固定格式：[Week1]，在下面討論區貼上網址，按下Submit new issue
12. 重新整理後，機器人會自動加上標鑯，配給同組同學來看作業
13. 老師看完作業，覺得ok，就會Marge pull request，在刪除我的branch，同時close issue==>作業ok
14. 到本地端，切換到master:git ckeckout master
15. 把 marge 完的 master 給 pull 下來：git pull origin master
16. 將本地的 week1 刪除：git branch -d week1
17. 只剩一個 master 
