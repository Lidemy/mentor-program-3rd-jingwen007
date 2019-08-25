const body = document.querySelector('.body')
const bg = document.querySelector('#bg')
const resetBtn = document.querySelector('.resetBtn');  
let flag = false;

function startGame(){
  const start = new Date().getTime();
  console.log("start"+start)
  limitTime = Math.floor((Math.random()*3)*1000)/1000;//用亂數取時間為毫秒，
  setTimeout((e) => {
    body.classList.add('active')
  },limitTime*1000)
  	const changeTime = new Date().getTime();
    body.addEventListener('click', (e) => 
    {
    	const end = new Date().getTime();
    	const diff = (end - changeTime)/1000

    	if((diff < limitTime) && flag == false) {
    		alert("按太快了")
    	}
    	else if((diff > limitTime) && flag == false)
    	{
    		if(end >= start){
    			flag = true;
    			var second = (end-changeTime)/1000
    			 second -=  limitTime
    			resetBtn.style.display = 'block';
    			alert(+second.toFixed(2))
    		}
    		else{
    			flag = true;
    			var second = end+60-changeTime;  
    			resetBtn.style.display = 'block';
    			e.stopPropagation();
    			alert("共花了："+second)	
    		}
    	} 
    	else{
    		return true;
    	} 
    })
  }  
  resetBtn.addEventListener('click', (e) => {
  	e.stopPropagation();
  	body.classList.remove('active')
  	resetBtn.style.visibility = 'hidden';
  	window.location.reload();
  }) 
  startGame()