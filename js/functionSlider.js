
var slideIndex = 5;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("slideAuto");
  var dots = document.getElementsByClassName("demo");
  
  if (n > x.length) {
    slideIndex = 1;
  }
  if (n < 1) {
      slideIndex = x.length;
     
    } 
    
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
 
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}

var slideBarIndex = 0;
function funSlideBar() {
    var i;
    var x = document.getElementsByClassName("slideBar");

    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    slideBarIndex++;

    if (slideBarIndex > x.length) {
        slideBarIndex = 1
    }
    x[slideBarIndex - 1].style.display = "block";
    setTimeout(funSlideBar, 2000);
}




function changeContextMenu(option) {
    var x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
        x[i].className = "menu w3-padding-medium";
    }
    
    document.getElementById("menu"+option).className = "menu w3-padding-medium w3-theme-d1";
}