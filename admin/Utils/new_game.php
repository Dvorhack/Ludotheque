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
$name = $_POST['name'];
$age = $_POST['age'];
$type = $_POST['type'];
$abstract = $_POST['abstract'];
$req = "INSERT INTO `Game` (`ID_Game`, `Name`, `Age`, `Type`, `Abstract`) VALUES (NULL, '$name', '$age', '$type', '$abstract')";
//echo $req;
$res = $conn->query($req);
//var_dump($res);
header("Location: http://ludo.serviel.fr/admin/listGames.php?ajout=1");
exit();