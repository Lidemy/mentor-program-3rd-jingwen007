const btn = document.querySelectorAll('.btn');
const result = document.querySelector('#result');
let flag = 0; 
let numArray = [];
let op = '';
document.querySelector('.wrap').addEventListener('click',function(e){
  if (e.target.classList.contains('num')) {      
    result_num = e.target.getAttribute('data-value')
    console.log('op:'+op)
    console.log('result.value:'+result.value)
    if((result.value == 0 && op == '')){ //第一次輸入數字，一開始初始值為0且無運算元
      result.value = '';//清空 result
      result.value += result_num;//將 num1 寫入 result
      flag = 1;
      //console.log("flag"+flag);
      //console.log('執行if，你按了'+result.value);    
    } else if (result.value == 0 && (op == '+' || op == '-' || op == '*' || op == '/')){ //若第一次執行沒輸入值，但有輸入運算元
      result.value = '';
      result.value  += result_num;      
      console.log("flag"+flag);
      console.log('執行else if 1，你按了'+result.value);
    } else if (result.value > 0 && (op == '+' || op == '-' || op == '*' || op == '/') && flag == 1){//若有輸入值且有運算元且是第二次輸入(num2)
      result.value = '';
      result.value  += result_num;
      console.log("flag"+flag);
      console.log('執行else if 2，你按了'+result.value);
      flag = 0;
    } else if(result.value > 0 && op == ''){ //若有值而沒按下運算元    
      result.value += result_num; //放第2,3,4....位置
      console.log("flag"+flag);
      console.log('執行else if 3，你按了'+result.value);
    } 
    else{
      console.log("flag"+flag);
      result.value  += result_num;
      console.log('執行else，你按了'+result.value);
    } 
} 
})
operator('.add-btn');
operator('.sub-btn');
operator('.mul-btn');
operator('.div-btn');
operator('.ac-btn');

function operator(className) {
  document.querySelector(className).addEventListener('click',function(e){
    numArray.push(result.value);  
    if(className == '.add-btn')
      op = '+';
    else if(className == '.sub-btn')  
      op= '-';
    else if(className == '.mul-btn')  
      op= '*';
    else if(className == '.div-btn')  
      op= '/';  
    else if (className == '.ac-btn'){
      result.value = '0'
      op = ''
      numArray =[]
    }  
   })
}
 document.querySelector('.result-btn').addEventListener('click',function(e){
   numArray.push(result.value);
   console.log(numArray)
   switch(op) { 
     case '+':      
       result.value = parseInt(numArray[0]) + parseInt(numArray[1]);
       break;  
     case '-':      
       result.value = parseInt(numArray[0]) - parseInt(numArray[1]);
       break;  
     case '*':      
       result.value = parseInt(numArray[0]) * parseInt(numArray[1]);
       break;  
     case '/':      
       result.value = parseInt(numArray[0]) / parseInt(numArray[1]);
       break;              
     }
 })