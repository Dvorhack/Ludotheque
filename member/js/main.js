function elt_over(nb){
    var elt = document.getElementsByClassName('elt')[nb];
    //elt.getElementsByTagName('img')[0].style.width = "100px";
    elt.getElementsByClassName('info')[0].style.visibility = "initial";
    elt.style.opacity = "0.2";
    elt.getElementsByClassName('info')[0].style.opacity = "1";
}

function elt_out(nb){
    var elt = document.getElementsByClassName('elt')[nb];
    //elt.getElementsByTagName('img')[0].style.width = "200px";
    elt.getElementsByClassName('info')[0].style.visibility = "hidden";
    elt.style.opacity = "1";
}

var infoBox = document.getElementById("infoBox");
var span = document.getElementsByClassName("hideInfo")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
age.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == infoBox) {
    ageBox.style.display = "none";
}

}

function showInfo(div){
    infoBox.style.display = "block";
}