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
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/nav.css">
        <script src="script.js"></script>
    </head>
    <?php 
    include "header.php";
    ?>
    <body>
        <?php 
        include "nav.php";
        ?>
        <div class="main">
            <a href="index.php"><img src="../Images/return.png" /></a>
            <h1>Emprunts en cours</h1>
            <div class="elt">
                <img class="game_img" src="../Images/jungle_speed.jpg"/>
                <h2>Jungle Speed</h2>
                <h3>2-5 Joueurs</h3>
                <p>C'est un super jeu entre amis</p>
            </div>
        </div>
        <script src="js/header.js"></script>
    </body>
</html>