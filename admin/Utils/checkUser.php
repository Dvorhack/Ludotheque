<?php
session_start();
if(isset($_SESSION["id"]) == false){
    header("Location: http://ludo.serviel.fr/");
    exit();
}elseif($_SESSION["admin"] == 0){
    header("Location: http://ludo.serviel.fr/member/");
    exit();
}

?>