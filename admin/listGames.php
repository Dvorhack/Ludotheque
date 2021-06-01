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
            <h1>Voici la liste des jeux :</h1></br>
            <?php
            $query = "SELECT * FROM Game, Stock WHERE Game.ID_Game = Stock.ID_Game"; 
            $result = $conn->query($query);
            //var_dump($result);
            echo "<table>"; 
            ?>
            
            <thead><tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Age min</th>
                <th>Type</th>
                <th>Description</th>
                <th>Nb total</th>
                <th>Nb dispo</th>
            </tr></thead>
            <?php

            while($row = mysqli_fetch_array($result)){  
            //var_dump($row);
            echo "<tr><td>" . $row['ID_Game'] . 
                "</td><td>" . $row['Name'] . 
                "</td><td>" . $row['Age'] . 
                "</td><td>" . $row['Type'] . 
                "</td><td>"  . $row['Abstract'] . 
                "</td><td>"  . $row['Number'] . 
                "</td><td>"  . $row['Available'] . 
                "</td><td><button type='button' class='modifGame' onclick='modifNbJeu(".$row['ID_Game'].")'>Modifier</button>" .
                "</td><td><button type='button' onclick='supprJeu(".$row['ID_Game'].")'>Supprimer</button></td></tr>"; 
            }

            echo "</table>"; 
            
            ?>
            <button type='button' id='addGame'>Ajouter</button>
            <?php 
            if(isset($_GET['ajout']))
                if($_GET['ajout'] == 1)
                    echo "<h3>Jeu ajouté !</h3>";
            if(isset($_GET['suppr']))
                if($_GET['suppr'] == 1)
                    echo "<h3>Jeu supprimé !</h3>";
            ?>
        </div>
        <div id="popupBox" class='popup'>
            <div class="popup-content">
                <span class="close">&times;</span>
                <h2>Ajout Jeu</h2>
                <form action="Utils/new_game.php" method='POST'>
                    <label><b>Nom</b></label>
                    <input type="text" placeholder="Nom du jeux" name="name" required></br>
                    <label><b>Age minimum</b></label>
                    <input type="number" placeholder="Age minimum" name="age" required></br>
                    <label><b>Type de jeu</b></label>
                    <select name="type" id="pet-select">
                        <option value="">--Please choose an option--</option>
                        <option value="Societe">Jeu de societe</option>
                        <option value="construction">Jeu de construction</option>
                        <option value="JeuVideo">Jeu vidéo</option>
                        <option value="Eveil">Jeu d'éveil</option>
                    </select></br>
                    <label><b>Desciption</b></label>
                    <input type="text" placeholder="Description" name="abstract" required></br>
                    <label><b>Nb Joueurs min</b></label>
                    <input type="number" placeholder="Description" name="NbMin" required></br>
                    <label><b>Nb Joueurs max</b></label>
                    <input type="number" placeholder="Description" name="NbMax" required></br>
                    <label><b>Nombre</b></label>
                    <input type="number" placeholder="Nombre de jeux" name="nb" required></br>

                    <input type="submit" id='submit' value='Ajouter' >
                </form>
            </div>
        </div>
        <div id="modifBox" class='popup'>
            <div class="popup-content">
                <span class="close">&times;</span>
                <h2 id='title-modifBox'></h2>
                <form name="modifGame-form" action="Utils/modif_NbGame.php" method='POST'>
                    <label><b>Action</b></label>
                    <select name="action" id="pet-select">
                        <option value="">--Please choose an option--</option>
                        <option value="ajouter">Ajouter</option>
                        <option value="enlever">Enlever</option>
                    </select></br>
                    <label><b>Nombre</b></label>
                    <input type="number" placeholder="Nombre de jeux" name="nb" required></br>
                    <input type="hidden" name="id" id='hiddenID' value="">

                    <input type="submit" id='submit' value='Modifier' >
                </form>
            </div>
        </div>
        <script>
            // Get the modal
            var popup = document.getElementById("popupBox");

            // Get the button that opens the modal
            var btn = document.getElementById("addGame");

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
            // Get the modal
            var modifBox = document.getElementById("modifBox");

            // Get the button that opens the modal
            var modifBtn = document.getElementsByClassName("modifGame");

            // Get the <span> element that closes the modal
            var span1 = document.getElementsByClassName("close")[1];
            /*for(var i=0; i<modifBtn.length; i++){
                // When the user clicks the button, open the modal 
                modifBtn[i].onclick = function() {
                modifBox.style.display = "block";
                }
            }*/
            function modifNbJeu(id){
                modifBox.style.display = "block";
                document.getElementById("title-modifBox").innerHTML = "Modification du jeu id=" + id;
                document.getElementById("hiddenID").value = id;
            }

            // When the user clicks on <span> (x), close the modal
            span1.onclick = function() {
            modifBox.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modifBox) {
                modifBox.style.display = "none";
            }
            }
        </script>
    </body>
</html>