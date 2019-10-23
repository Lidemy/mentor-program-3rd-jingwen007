const result = document.querySelector('.result');
const btn = document.querySelector('button');
// const img = document.querySelector('.imageBox');
const request = new XMLHttpRequest();

let prizeResult = '';

request.onload = () => {
  if (request.status >= 200 && request.status < 400) {
    console.log(request.responseText);
    prizeResult = JSON.parse(request.responseText);
    //透過 responseText 屬性取得回應的文字 text，回應的是 常見的 JSON，則可以使用 JSON.parse() 方法，解析 responseText 屬性。
    console.log(prizeResult.prize);
  } else {
    alert('系統不穩定，請再試一次');
  }
};
request.open('GET', 'https://dvwhnbka7d.execute-api.us-east-1.amazonaws.com/default/lottery', true);
//用 GET  這個method，發 request 到 https://dvwhnbka7d.execute-api.us-east-1.amazonaws.com/default/lottery
request.send();
////最後用 Request.send() 把request給 send出去

btn.addEventListener('click', () => {
  if (prizeResult.prize === 'FIRST') {
    document.querySelector('body').classList.add('first__background');
    result.classList.add('WinFont');
    result.innerHTML = '<h3>恭喜你中頭獎了！日本東京來回雙人遊！</h3>';
  } else if (prizeResult.prize === 'SECOND') {
    btn.classList.add('noDisplay');
    result.classList.add('WinFont');
    result.innerHTML = '<h3>二獎！90 吋電視一台！</h3>';
  } else if (prizeResult.prize === 'THIRD') {
    btn.classList.add('noDisplay');
    result.classList.add('WinFont');
    result.innerHTML = '<h3>恭喜你抽中三獎：知名YouTuber 簽名握手會入場券一張，bang！</h3>';
  } else if (prizeResult.prize === 'NONE') {
    btn.classList.add('noDisplay');
    result.innerHTML = '<h3>銘謝惠顧</h3><br>';
    document.querySelector('body').classList.add('none');
    result.classList.add('LoseFont');
  } else if (prizeResult.error === true) {
    alert('系統不穩定，請再試一次');
  }
});