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

    <body>
        <?php 
        include "nav.php";
        ?>
        <div class="main">
            <a href="index.php"><img src="../Images/return.png" /></a>
            <form action="Utils/chgmdp.php" method="POST">
                <label><b>Votre ID: <?php echo $_SESSION["id"] ?></b></label>
                </br>
                
                <label><b>Nouveau Mot de Passe: </b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                </br>
                
                <label><b>Confirmer Mot de Passe: </b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                </br>

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