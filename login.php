<?php
include "connect_sql.php";

if(isset($_POST["id"]) && isset($_POST["password"])){
    $tmp = $_POST["id"];
    $req = "SELECT * FROM Member WHERE ID_Member='$tmp'";
    $res = $conn->query($req);
    $data = mysqli_fetch_array($res);
    $pass = $data['Password'];

    if(md5($_POST["password"]) == $pass){
        session_start();
        $_SESSION["id"] = $_POST["id"];
        if($_SESSION["id"] == 20210){
            $_SESSION["admin"] = 1;
            header("Location: http://ludo.serviel.fr/admin/");
        }
        else{
            $_SESSION["admin"] = 0;
            header("Location: http://ludo.serviel.fr/member/");
        }
        exit();
    }
}

header("Location: http://ludo.serviel.fr/?erreur=1");
exit();
?>