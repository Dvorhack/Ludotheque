function elt_over(nb){
    var elt = document.getElementsByClassName('elt')[nb];
    //elt.getElementsByTagName('img')[0].style.width = "100px";
    elt.getElementsByTagName('h3')[0].style.visibility = "initial";
    elt.style.opacity = "0.2";
    elt.getElementsByTagName('h3')[0].style.opacity = "1";
}

function elt_out(nb){
    var elt = document.getElementsByClassName('elt')[nb];
    //elt.getElementsByTagName('img')[0].style.width = "200px";
    elt.getElementsByTagName('h3')[0].style.visibility = "hidden";
    elt.style.opacity = "1";
}