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
                "</td><td>" . $row['LastName'] . 
                "</td><td>"  . $row['Phone'] . "</td><td><button type='button' onclick='unimplemented()'>Supprimer</button></td></tr>"; 
            }

            echo "</table>"; 
            
            ?>
            <button type='button' id='ajoutUser' >Ajouter</button>
            <?php 
            if(isset($_GET['ajout']))
                if($_GET['ajout'] == 1)
                    echo "<h3>Utilisateur ajouté !</h3>"
            ?>
        </div>
        <div id="popupBox" class='popup'>
            <div class="popup-content">
                <span class="close">&times;</span>
                <h2>Création utilisateur</h2>
                <form action="new_user.php" method='POST'>
                    <label><b>Prénom</b></label>
                    <input type="text" placeholder="Prénom" name="fname" required></br>
                    <label><b>Nom</b></label>
                    <input type="text" placeholder="Nom" name="lname" required></br>
                    <label><b>Numéro télephone</b></label>
                    <input type="tel" placeholder="Entrer le nom d'utilisateur" name="phone" required></br>
                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required></br>

                    <input type="submit" id='submit' value='LOGIN' >
                </form>
            </div>
        </div>
        <script>
            // Get the modal
            var popup = document.getElementById("popupBox");

            // Get the button that opens the modal
            var btn = document.getElementById("ajoutUser");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
            popup.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            popup.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.display = "none";
            }
            }
        </script>
    </body>
</html>