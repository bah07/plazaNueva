/*******************************************/
var slideIndex = 5;
var slideBarIndexofertas = 0;
/********************************************/

showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  console.log("slideIndex="+slideIndex);
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
/*******************************************/

function funSlideBar() {
    var i;
    var x = document.getElementsByClassName("slideBarside");

    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    slideBarIndexofertas++;

    if (slideBarIndexofertas > x.length) {
        slideBarIndexofertas = 1;
    }
    x[slideBarIndexofertas - 1].style.display = "block";
    setTimeout(funSlideBar, 2000);
}


/*******************************************/

function changeContextMenu(option) {
    var x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
        x[i].className = "menu w3-padding-medium";
    }
    
    document.getElementById("menu"+option).className = "menu w3-padding-medium w3-theme-d1";
}

/*******************************************/

var slideIndexpro=1;
console.log("slideIndexpro="+slideIndexpro);
showDivspro(slideIndexpro);

function plusDivspro(n) {
  showDivspro(slideIndexpro += n);
}

function currentDivpro(n) {
  showDivspro(slideIndexpro = n);
}

function showDivspro(n) {
    console.log("n = "+n);
  var i;
  var x = document.getElementsByClassName("slideB");
  var dots = document.getElementsByClassName("demopro");
  if (n > x.length) {slideIndexpro = 1}    
  if (n < 1) {slideIndexpro = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndexpro-1].style.display = "block";  
  dots[slideIndexpro-1].className += " w3-red";
}
