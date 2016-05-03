//Slide automatico
var slideIndex = 0;

function carousel() {
    var i;
    var x = document.getElementsByClassName("slideAuto");

    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    slideIndex++;

    if (slideIndex > x.length) {
        slideIndex = 1
    }
    x[slideIndex - 1].style.display = "block";
    setTimeout(carousel, 5000);
}

//Slide manual
var slideIndexA = 1;
var slideIndexB = 1;

function plusDivs(n, nameDiv) {
    if (nameDiv == "slideA") {
        showDivs(slideIndexA += n, nameDiv);
    }
    if (nameDiv == "slideB") {
        showDivs(slideIndexB += n, nameDiv);
    }
}

function currentDiv(n, nameDiv) {
    if (nameDiv == "slideA") {
        showDivs(slideIndexA = n, nameDiv);
    }
    if (nameDiv == "slideB") {
        showDivs(slideIndexB = n, nameDiv);
    }
}

function showDivs(n, nameDiv) {
    //console.log("function: showDiv param: "+n+" "+nameDiv);
    var i;
    var x = document.getElementsByClassName(nameDiv);
    //console.log(x);

    if (n > x.length && nameDiv == "slideA") {
        slideIndexA = 1
    }
    if (n > x.length && nameDiv == "slideB") {
        slideIndexB = 1
    }

    if (n < 1 && nameDiv == "slideA") {
        slideIndexA = x.length
    }
    if (n < 1 && nameDiv == "slideB") {
        slideIndexB = x.length
    }

    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }

    if (nameDiv == "slideA") {
        x[slideIndexA - 1].style.display = "block";
    }
    if (nameDiv == "slideB") {
        x[slideIndexB - 1].style.display = "block";
    }
}