const request = new XMLHttpRequest();
const container = document.querySelector('.wrap');

request.onload = function () {
  if (request.status >= 200 && request.status < 400) {
    const json = JSON.parse(request.responseText);//將回傳的 data 用 JSON.parse 回來的資料

    for (let i = 0; i < json.streams.length; i += 1) {
      const elements = document.createElement('a');
      elements.classList.add('box__div');
      elements.setAttribute('href', `${json.streams[i].channel.url}`);
      elements.setAttribute('target', '_blank');
      elements.innerHTML = `<div class="box__movie">
        <img src="${json.streams[i].preview.medium}"/>
        <div class="box__info">
          <img src="${json.streams[i].channel.logo}" class="box__logo"/>
          <div class="box__channel">
            <div class="box__status">${json.streams[i].channel.status}</div>
            <div class="box__name">${json.streams[i].channel.display_name} (${json.streams[i].channel.name})</div>
          </div>
        </div>
      </div>`;
      container.appendChild(elements);
    }
  } else {
    console.log(request.status);
  }
};

request.onerror = function error() {
  console.log('error');
};

var clientId = "8x25m0rmkmapk5rcpzjw169kedlbhj";
var limit = 20;
var apiUrl = 'https://api.twitch.tv/kraken/streams/?client_id=' + clientId + '&game=League%20of%20Legends&limit=' + limit;

request.open('GET', apiUrl, true);
request.setRequestHeader('Accept', 'application/vnd.twitchtv.v5+json');
request.setRequestHeader('Client-ID', clientId);
request.send();
