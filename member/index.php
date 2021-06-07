<?php
session_start();
if(isset($_SESSION["id"]) == false){
    header("Location: http://ludo.serviel.fr/");
    exit();
}elseif($_SESSION["admin"] == 1){
    header("Location: http://ludo.serviel.fr/admin/");
    exit();
}

include "../connect_sql.php"
?>
<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Member Page</title>
        <!--<link rel="stylesheet" href="style.css">-->
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="script.js"></script>
        
    </head>

    <body>
        <?php 
        include "header.php";
        include "nav.php";
        ?>
        <div class="main">
            <p>Bienvnue sur le site de laludotheque Paul</p>
        </div>
        <script src="js/header.js"></script>
    </body>
</html>