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
$NbMin = $_POST['NbMin'];
$NbMax = $_POST['NbMax'];
$nb = $_POST['nb'];
$req = "INSERT INTO `Game` (`ID_Game`, `Name`, `Age`, `Type`, `Abstract`, `J_Min`, `J_Max`) VALUES (NULL, '$name', '$age', '$type', '$abstract', '$NbMin', '$NbMax'); ";
//$req .= "INSERT INTO `Stock` (`ID_Game`, `Number`, `Available`) VALUES (NULL, '$nb', '$nb');"
$res = $conn->query($req);

if(!$res)
    echo "Probleme: " . $conn->errno . " |" . $conn->error;

$req = "INSERT INTO `Stock` (`ID_Game`, `Number`, `Available`) VALUES (NULL, '$nb', '$nb'); ";
$res = $conn->query($req);
//echo $req;



//var_dump($res);
if($res){
header("Location: http://ludo.serviel.fr/admin/listGames.php?ajout=1");
exit();
}else
    echo "Probleme: " . $conn->errno . " |" . $conn->error;