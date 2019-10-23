//const url = 'https://lidemy-book-store.herokuapp.com/posts';
const url = 'https://lidemy-book-store.herokuapp.com/posts?_sort=id&_order=desc';
//const url = 'https://lidemy-book-store.herokuapp.com/posts?_limit=20&_sort=id&_order=desc';

const request = new XMLHttpRequest();//產生一個XMLHttpRequest實體
const replyBox = document.querySelector('.replyBox');
const btn = document.querySelector('.btn');
const message = document.querySelector('.message');
let msg = '';

request.onload = function () {
    if (request.status >= 200 && request.status <= 400) {
        msg = JSON.parse(request.responseText);//將回傳的 data 用 JSON.parse 回來的資料

        const msgLen = msg.length;
        for (let i = 0; i < msg.length; i += 1) {
            const div = document.createElement('div');
            div.classList.add('reply');
            div.innerHTML += `<h3># ${msg[i].id}</h3> <div>${msg[i].content}</div>`;
            // console.log(div);
            replyBox.appendChild(div);
        }
    } else {
        console.log(request.status)
    }
}
request.onerror = function () {
    console.log('error');
}


request.open('GET', url, true); //發 request 到 urlPost 的地方， true為非同步
request.send();//把 request 給傳送出去



btn.addEventListener('click', (e) => {
    const msgLen = msg.length;

    e.preventDefault();
    if (message.value === '') { //若無留言
        alert('請輸入留言');
    } else { 

        const newMessage= `content=${message.value}`;  //抓取留言
        request.open('POST', 'https://lidemy-book-store.herokuapp.com/posts', true);//提交表單，非同步
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); //設置表單 Content-Type 表頭
        console.log(newMessage);
        request.send(newMessage);
        
        //讓最後一筆留言顯示在畫面 
        //抓不到第二次新增後的留言數字

        const newNode = document.createElement('div');
        newNode.classList.add('reply');
        newNode.innerHTML = `<h3># ${msgLen + 1}</h3> <div>${message.value}</div>`;
        replyBox.insertBefore(newNode, replyBox.firstChild); //插入第一個節點   
      
        /*
        message.value = '';
        replyBox.innerHTML = '';
        request.open('GET', 'https://lidemy-book-store.herokuapp.com/posts?_sort=id&_order=desc', true);
        request.send();        
        */
    }
});