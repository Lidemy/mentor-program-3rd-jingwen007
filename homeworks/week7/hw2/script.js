  let form__content = document.querySelector('.form__content');
  let form__email = document.querySelector('.form__email');
  let email = document.querySelector('#email');
  let form__name = document.querySelector('.form__name');
  let name = document.querySelector('#name');
  let form__type = document.querySelector('.form__type');
  let form__coding = document.querySelector('.form__coding');
  let section_content = document.querySelectorAll('.section_content');
  let section__headline = document.querySelectorAll(".section__headline")
  let form = document.getElementById("form");
  let work1 = document.querySelector('#work1');   
  let work2 = document.querySelector('#work2');
  let workType = document.querySelectorAll(".workType");
  let work__engineer = document.querySelector('.work__engineer');
  let work__amateur = document.querySelector('.work__amateur');

  let btn = document.querySelector('.btn');
  let emailFlag = false;
  let nameFlag = false;
  let codingFlag = false;

  function emailEvent(e) {
  e.stopPropagation();
  
    if (email.value === '' && emailFlag === false) {
      form__email.classList.add('blankBg');
      email.classList.add('blankBg');  

      const newText = document.createElement('div');
      newText.innerText = '這是必填問題';            
      newText.classList.add('newText');
      section_content[0].appendChild(newText);  
      emailFlag = true;
    } else if (email.value !== '') {
      form__email.classList.remove('blankBg');
      email.classList.remove('blankBg');  

      let newText = document.querySelectorAll('.newText')[0];
      newText.style.visibility="hidden";
      } else {
      form__email.classList.add('blankBg');
      email.classList.add('blankBg');  
      let newText = document.querySelectorAll('.newText')[0];
      newText.style.visibility="visible";
      }
}
  function nameEvent(e) {
    e.stopPropagation();
    if (name.value === '' && nameFlag === false) {
      form__name.classList.add('blankBg');
      name.classList.add('blankBg');

      const newText = document.createElement('div');
      newText.innerText = '這是必填問題';
      newText.classList.add('newText');
      section_content[1].appendChild(newText);  
      nameFlag = true;
    } else if (name.value !== '') {
        form__name.classList.remove('blankBg');
        name.classList.remove('blankBg');

        let newText1 = document.querySelectorAll('.newText')[1];
        newText1.style.visibility="hidden";
        } else {
          form__name.classList.add('blankBg');
          name.classList.add('blankBg');
          let newText1 = document.querySelectorAll('.newText')[1];
          newText1.style.visibility="visible";
        }
     }
  function codingEvent(e) {
    e.stopPropagation();
    if (coding.value === '' && codingFlag === false) {
      form__coding.classList.add('blankBg');
      coding.classList.add('blankBg');

      const newText = document.createElement('div');
      newText.innerText = '這是必填問題';
      newText.classList.add('newText');
      section_content[3].appendChild(newText);  
      codingFlag = true;
    } else if (coding.value !== '') {
        form__coding.classList.remove('blankBg');
        coding.classList.remove('blankBg');

        let newText3 = document.querySelectorAll('.newText')[3];
        newText3.style.visibility="hidden";
        } else {
          form__coding.classList.add('blankBg');
          coding.classList.add('blankBg');
          let newText3 = document.querySelectorAll('.newText')[3];
          newText3.style.visibility="visible";
        }
     }     
function wrokTypeEvent(e) {
  e.stopPropagation();
  if (work1.checked === false && work2.checked === false) {
    form__type.classList.add('blankBg');
    const newText = document.createElement('div');
    newText.innerText = '這是必填問題';
    newText.classList.add('newText');
    section_content[2].appendChild(newText);
    workFlag = true;
  } else if (workType !== '') {
    form__type.classList.remove('blankBg');
    let newText2 = document.querySelectorAll('.newText')[2];
    newText2.style.visibility = "hidden";
  } else {
    form__type.classList.add('blankBg');
    workType.classList.add('blankBg');
    let newText2 = document.querySelectorAll('.newText')[2];
    newText2.style.visibility = "visible";
  }
}     
btn.addEventListener('click', emailEvent,false);
btn.addEventListener('click', nameEvent, false);     
btn.addEventListener('click', wrokTypeEvent, false);
btn.addEventListener('click', codingEvent, false);    