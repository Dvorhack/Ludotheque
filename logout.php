<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["admin"]);
header("Location: http://ludo.serviel.fr/");
exit();
?>