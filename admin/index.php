<?php
session_start();
if(isset($_SESSION["id"]) == false){
    header("Location: http://ludo.serviel.fr/");
    exit();
}elseif($_SESSION["admin"] == 0){
    header("Location: http://ludo.serviel.fr/member/");
    exit();
}


include "../connect_sql.php"
?>

<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <p>Bienvenue Admin</p>
        <a href="../logout.php">LOGOUT</a>
    </body>
</html>