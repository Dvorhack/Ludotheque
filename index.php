<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location: http://ludo.serviel.fr/main.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Connection</title>
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        <div id="wrapper">
            <form action="login.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>ID Utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="id" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php 
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }?>
            </form>
        </div>
    </body>
</html>