function unimplemented(){
    alert('Non implementée !');
}

function search(ele) {
    if(event.key === 'Enter') {
        alert(ele.value);        
    }
}

function supprJeu(id){
    document.location.href = "Utils/supprGame.php?idJeu=" + id;
}

function supprMember(id){
    if(id == 20210)
        alert("Vous n'avez pas le droit de supprimer le compte administrateur");
    document.location.href = "Utils/supprMember.php?idMem=" + id;
}