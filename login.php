<?php
include "connect_sql.php";

if(isset($_POST["id"]) && isset($_POST["password"])){
    $tmp = $_POST["id"];
    $req = "SELECT * FROM Member WHERE ID_Member='$tmp'";
    $res = $conn->query($req);
    $data = mysqli_fetch_array($res);
    $pass = $data['password'];

    if(md5($_POST["password"]) == $pass){
        session_start();
        $_SESSION["user"] = $_POST["username"];
        header("Location: http://ensim.serviel.fr/main.php");
        exit();
    }
}

//header("Location: http://ensim.serviel.fr/?erreur=1");
//exit();
?>