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

    // UPDATE `Stock` SET `Available` = '4' WHERE `Stock`.`ID_Game` = 12
    session_start();
    $id = $_SESSION['id'];
    $game = $row['ID_Game'];
    $date = date('Y-m-d H:i:s');
    $returnDate = date('Y-m-d', strtotime("+1 month, $date"));
    $nb = $nb-1;
    $req = "UPDATE `Stock` SET `Available` = '$nb' WHERE `Stock`.`ID_Game` = $game ; ";
    $req .= "INSERT INTO `Booking` (`ID_Member`, `ID_Game`, `GetDate`, `ReturnDate`) VALUES ('$id', '$game', '$date', '$returnDate');";
    //echo $req;
    $res = $conn->multi_query($req);
    //$row = mysqli_fetch_array($res);
    echo "0";
    exit();
}