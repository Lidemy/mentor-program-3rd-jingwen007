function isValid(arr) {
  for(var i=0; i<arr.length; i++) {
    if (arr[i] <= 0) return 'invalid'
  }
  for(var i=2; i<arr.length; i++) {
    if (arr[i] !== arr[i-1] + arr[i-2]) return 'invalid'
  }
  return 'valid'
}

isValid([3, 5, 8, 13, 22, 35])


## 執行流程
 1. 執行第11行，跳到第1行，並輸入陣列[3, 5, 8, 13, 22, 35]到函式isValid
 
 進入第一個for迴圈
 2. 執行第2行，設定變數i是0，檢查i(0)是否<輸入陣列長度6，是，開始執行第3行，進入第一圈迴圈
 3. 執行第3行，判斷第0個陣列內容(3)是否小於0，是，就回傳invaild，不是，第一圈迴圈結束
 
 4. 執行第2行，i++，i變成1，檢查i(1)是否小於輸入陣列長度6，是，開始執行第3行，進入第二圈迴圈
 6. 執行第3行，判斷第0個陣列內容(5)是否小於0，是，就回傳invaild，不是，第二圈迴圈結束
 
 7. 執行第2行，i++，i變成2，檢查i(2)是否小於輸入陣列長度6，是，開始執行第3行，進入第三圈迴圈
 8. 執行第3行，判斷第0個陣列內容(8)是否小於0，是，就回傳invaild，不是，第三圈迴圈結束
 
 9. 執行第2行，i++，i變成3，檢查i(3)是否小於輸入陣列長度6，是，開始執行第3行，進入第四圈迴圈
10. 執行第3行，判斷第0個陣列內容(13)是否小於0，是，就回傳invaild，不是，第四圈迴圈結束
1
1. 執行第2行，i++，i變成4，檢查i(4)是否小於輸入陣列長度6，是，開始執行第3行，進入第五圈迴圈
12. 執行第3行，判斷第0個陣列內容(22)是否小於0，是，就回傳invaild，不是，第五圈迴圈結束

13. 執行第2行，i++，i變成5，檢查i(5)是否小於輸入陣列長度6，是，開始執行第3行，進入第六圈迴圈
14. 執行第3行，判斷第0個陣列內容(35)是否小於0，是，就回傳invaild，不是，第六圈迴圈結束

15. 執行第2行，i++，i變成6, 檢查i(6)是否小於輸入陣列長度6，不是，for迴圈結束

 進入第二個for迴圈
16. 執行第5行，設定變數i是2，檢查i(2)是否<輸入陣列長度6，是，開始執行第6行，進入第一圈迴圈
17. 執行第6行，判斷第2個陣列內容(8)是否不等於第0個陣列內容(3)+第1個陣列內容(5)，是(3+5=8)，就回傳invaild，不是，第二圈迴圈結束

18. 執行第5行，i++，i變成3，檢查i(3)是否小於輸入陣列長度6，是，開始執行第6行，進入第三圈迴圈
16. 執行第6行，判斷第2個陣列內容(13)是否不等於第1個陣列內容(5)+第2個陣列內容(8)，是(5+8=13)，就回傳invaild，不是，第三圈迴圈結束

19. 執行第5行，i++，i變成4，檢查i(4)是否小於輸入陣列長度6，是，開始執行第6行，進入第四圈迴圈
20. 執行第6行，判斷第2個陣列內容(22)是否不等於第2個陣列內容(8)+第3個陣列內容(13)，是(8+13=21)，回傳invaild，
isValid函式結束，印出invaild