// Get the modal
var ageBox = document.getElementById("ageBox");
var nbBox = document.getElementById("nbMinBox");
var typeBox = document.getElementById("nbMaxBox");

// Get the button that opens the modal
var ageBtn = document.getElementById("ageBtn");
var nbBtn = document.getElementById("nbMinBtn");
var typeBtn = document.getElementById("nbMaxBtn");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];
var span3 = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
ageBtn.onclick = function() {
ageBox.style.display = "block";
}
nbBtn.onclick = function() {
nbBox.style.display = "block";
}
typeBtn.onclick = function() {
typeBox.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
age.style.display = "none";
}
span2.onclick = function() {
nbBox.style.display = "none";
}
span3.onclick = function() {
typeBox.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == ageBox) {
    ageBox.style.display = "none";
}
if (event.target == nbBox) {
    nbBox.style.display = "none";
}
if (event.target == typeBox) {
    typeBox.style.display = "none";
}
}
function removeFilter(id){
    var url = window.location.href;    
    if (url.indexOf('?') > -1){
        url += '&remove=' + id
    }else{
        url += '?remove=' + id
    }
    window.location.href = url;
}