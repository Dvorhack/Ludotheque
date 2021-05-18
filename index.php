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
    </head>

    <body>
        <div id="wrapper">
            <form action="login.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>ID Utilisateur</b></label>
                <input type="number" placeholder="Entrer le nom d'utilisateur" name="id" required>

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
        <?php
            include "connect_sql.php";
            $query = "SELECT * FROM Member"; //You don't need a ; like you do in SQL
            $result = $conn->query($query);
            //var_dump($result);
            echo "<table>"; // start a table tag in the HTML

            while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
            //var_dump($row);
            echo "<tr><td>" . $row['ID_Member'] . "</td><td>" . $row['FirstName'] . "</td></tr>";  //$row['index'] the index here is a field name
            }

            echo "</table>"; //Close the table in HTML
        ?>
    </body>
</html>