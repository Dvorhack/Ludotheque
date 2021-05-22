<?php
include "Utils/checkUser.php";

include "../connect_sql.php";
?>
<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/nav.css">
        <script src="script.js"></script>
    </head>
    <?php 
    //include "header.php";
    ?>
    <body>
        <?php 
        include "nav.php";
        ?>
        <div class="main">
            <h1>Admin Page</h1>
            <h3>Il y a 3 Utilisateurs</h3></br>
            <h3>Il y a 2 Jeux différents</h3></br>
            <h3>Il y a 25 jeux en tout</h3></br>
            <h3>Il y a 12 sont empruntés</h3></br>
            <h3>Il y a 13 sont disponibles</h3></br>
        </div>
    </body>
</html>