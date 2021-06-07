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

if(isset($_POST['action'])){
    include "../../connect_sql.php";
    $req = "SELECT * FROM 'Stock' WHERE ID_Game = ".$_POST['id'];
    $res = $conn->query($req);
    $row = mysqli_fetch_array($result);

    $nb1 = $row['Number']+$_GET['number'];
    $nb2 = $row['Available']+$_GET['number'];
    $req = "UPDATE `Stock` SET `Number` = '$nb1', `Available` = '$nb2' WHERE `Stock`.`ID_Game` = ".$_POST['id'];
    $res = $conn->query($req);
    echo $req;
}
//header("Location: http://ludo.serviel.fr/admin/listGames.php");
exit();
?>