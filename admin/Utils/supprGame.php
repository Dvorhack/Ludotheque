<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: http://ludo.serviel.fr/");
    exit();
}
if($_SESSION['admin'] == 0){
    header("Location: http://ludo.serviel.fr/member/");
    exit();
}
include "../../connect_sql.php";
$ID = $_GET['idJeu'];
$req = "DELETE FROM `Game` WHERE `Game`.`ID_Game` = $ID";
//echo $req;
$res = $conn->query($req);
//var_dump($res);
header("Location: http://ludo.serviel.fr/admin/listGames.php?suppr=1");
exit();
