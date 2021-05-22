<?php
session_start();
if(isset($_SESSION["id"])){
    if($_SESSION["admin"] == 1)
        header("Location: http://ludo.serviel.fr/admin/");
    else
        header("Location: http://ludo.serviel.fr/member/");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Connection</title>
        <link rel="stylesheet" href="css/login.css">
        <script src="js/main.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <form action="login.php" method="POST">
                <h1>Ludothèque</h1>
                
                <!--<label><b>ID Utilisateur</b></label>-->
                <input type="number" placeholder="Nom d'utilisateur" name="id" required></br>

                <!--<label><b>Mot de passe</b></label>-->
                <input type="password" placeholder="Mot de passe" name="password" required></br>

                <input type="submit" id='submit' value='Login' ></br>
                <?php 
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p></br>";
                }?>
                <button type='button' onclick="unimplemented()">Mot de passe oublié</a>
            </form>
        </div>
    </body>
</html>