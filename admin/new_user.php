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
include "../connect_sql.php";
$FN = $_POST['fname'];
$LN = $_POST['lname'];
$phone = $_POST['phone'];
$pass = MD5($_POST['password']);
$req = "INSERT INTO `Member` (`ID_Member`, `FirstName`, `LastName`, `Phone`, `Password`) VALUES (NULL, '$FN', '$LN', '$phone', '$pass')";
//echo $req;
$res = $conn->query($req);
//var_dump($res);
header("Location: http://ludo.serviel.fr/admin/listMember.php?ajout=1");
exit();