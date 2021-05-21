<?php
include "checkUser.php";

include "../connect_sql.php";
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
        <?php 
        include "nav.php";
        ?>
        <div class="main">
            <a href="index.php"><img src="../Images/return.png" /></a>
            <h1>Voici la liste des membres :</h1></br>
            <?php
            $query = "SELECT * FROM Member"; 
            $result = $conn->query($query);
            //var_dump($result);
            echo "<table>"; 

            while($row = mysqli_fetch_array($result)){   
            //var_dump($row);
            echo "<tr><td>" . $row['ID_Member'] . 
                "</td><td>" . $row['FirstName'] . 
                "</td><td>"  . $row['LastName'] . "</td><td><button type='button' onclick='unimplemented()'>Supprimer</button></td></tr>"; 
            }

            echo "</table>"; 
            
            ?>
            <button type='button' onclick='unimplemented()'>Ajouter</button>
        </div>
    </body>
</html>