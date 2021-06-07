<?php
if(isset($_GET['name'])){
    include "../../connect_sql.php";
    $req = "SELECT Available,Stock.ID_Game FROM Stock, Game WHERE Game.Name='".$_GET['name']."' AND Stock.ID_Game = Game.ID_Game";
    //echo $req;
    $res = $conn->query($req);
    $row = mysqli_fetch_array($res);
    //var_dump($row);
    //echo $row['Available'];
    $nb = intval($row['Available']);
    //echo $nb;
    if($nb == "0"){
        echo "-1";
        exit;
    }
    session_start();
    $id = $_SESSION['id'];
    $game = $row['ID_Game'];
    $date = date('Y-m-d H:i:s');
    $req = "INSERT INTO `Booking` (`ID_Member`, `ID_Game`, `GetDate`, `ReturnDate`) VALUES ('$id', '$game', '$date', '$date')";
    //echo $req;
    $res = $conn->query($req);
    //$row = mysqli_fetch_array($res);
    echo "0";
    exit();
}