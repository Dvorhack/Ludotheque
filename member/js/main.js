function elt_over(nb){
    var elt = document.getElementsByClassName('cards')[nb];
    //elt.getElementsByTagName('img')[0].style.width = "100px";
    elt.getElementsByClassName('info')[0].style.visibility = "initial";
}

function elt_out(nb){
    var elt = document.getElementsByClassName('cards')[nb];
    //elt.getElementsByTagName('img')[0].style.width = "200px";
    elt.getElementsByClassName('info')[0].style.visibility = "hidden";
    elt.style.opacity = "1";
}

var infoBox = document.getElementById("infoBox");
var span = document.getElementsByClassName("hideInfo")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
infoBox.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == infoBox) {
    infoBox.style.display = "none";
}
}

function showInfo(div){
    infoBox.style.display = "block";
    var name = div.getElementsByClassName("text")[0].innerHTML;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        infoBox.getElementsByClassName('game-content')[0].innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "api/getContent.php?name="+name, true);
    xhttp.send();
}

function reserver(){
    let name = document.getElementsByClassName("game-content")[0].getElementsByClassName('text')[0].innerHTML;
    var xhttp = new XMLHttpRequest();
    //document.location.href = "api/reserve.php?name="+name;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);
            if(this.responseText == -1)
                alert('Plus en stock');
            if(this.responseText == 0){
                alert('Jeu ajouté');
                document.location.reload();
            }

        }
    };
    xhttp.open("GET", "api/reserve.php?name="+name, true);
    xhttp.send();
}