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
            <h1>Voici la liste des emprunts en cours :</h1></br>
            <?php
            $query = "SELECT g.Name, m.FirstName, m.LastName, b.GetDate, b.ReturnDate FROM Booking b, Game g, Member m WHERE b.ID_Game=g.ID_Game AND m.ID_Member=b.ID_Member"; 
            $result = $conn->query($query);
            //var_dump($result);
            echo "<table>"; 
            ?>
            <thead><tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Jeu</th>
                <th>Date de début</th>
                <th>Date de fin</th>
            </tr></thead>
            <?php
            while($row = mysqli_fetch_array($result)){   
            //var_dump($row);
            echo "<tr><td>" . $row['FirstName'] . 
                "</td><td>" . $row['LastName'] .
                "</td><td>" . $row['Name'] .
                "</td><td>" . $row['GetDate'] . 
                "</td><td>"  . $row['ReturnDate'] . "</td><td><button type='button' onclick='unimplemented()'>Cloturer</button></td></tr>"; 
            }

            echo "</table>"; 
            
            ?>
        </div>
    </body>
</html>