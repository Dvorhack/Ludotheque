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

if(isset($_GET['id']) && isset($_GET['game'])){
    include "../../connect_sql.php";
    $req = "SELECT Available FROM Stock WHERE ID_Game = ".$_GET['game'];
    //echo $req;
    $res = $conn->query($req);
    $row = mysqli_fetch_array($res);
    //var_dump($row);
    //echo $row['Available'];
    $nb = intval($row['Available']);
    
    $nb = $nb+1;
    $req = "UPDATE `Stock` SET `Available` = '$nb' WHERE `Stock`.`ID_Game` = ".$_GET['game'];
    $res = $conn->query($req);

    $req = "DELETE FROM `Booking` WHERE `Booking`.`id` = ".$_GET['id'];
    $res = $conn->query($req);

}
header("Location: http://ludo.serviel.fr/admin/enCours.php");
exit();
?>