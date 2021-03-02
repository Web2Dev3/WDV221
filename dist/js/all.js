document.addEventListener('DOMContentLoaded', init, false);
function init(){
  function changeBackground () {
    document.body.style.backgroundColor = 'blanchedalmond';
  }
  function originalBackground () {
    document.body.style.backgroundColor = 'aliceblue';
  }
 function newStyle () {
    document.body.style.textShadow = "2px 2px black";
    document.body.style.fontSize = '1.8em';
  }
  var text = document.getElementById('page');
  text.addEventListener('mouseover', changeBackground);
  text.addEventListener('mouseout', originalBackground);
  text.addEventListener('click', newStyle);
};