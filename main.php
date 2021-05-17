<?php
session_start();
if(isset($_SESSION["user"]) == false){
    header("Location: http://ludo.serviel.fr/");
    exit();
}
include "connect_sql.php"
?>
