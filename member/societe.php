<?php
session_start();
if(isset($_SESSION["id"]) == false){
    header("Location: http://ludo.serviel.fr/");
    exit();
}elseif($_SESSION["admin"] == 1){
    header("Location: http://ludo.serviel.fr/admin/");
    exit();
}

include "../connect_sql.php"
?>
<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Member Page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/filtre.css">
        <script src="script.js"></script>
        
    </head>

    <body>
        <?php 
        include "header.php";
        include "nav.php";
        include "filtre.php";
        ?>
        <div class="main">
            <?php 
            $query = "SELECT * FROM Game"; 
            $result = $conn->query($query);
            $i=0;
            while($row = mysqli_fetch_array($result)){?>
            <div class="elt" onmouseover="elt_over(<?php echo $i ?>)" onmouseout="elt_out(<?php echo $i ?>)">
                <?php 
                $name = $row['Name'];
                if(file_exists("../Images/$name.png"))
                    echo "<img class='game_img' src='../Images/$name.png'/>";
                elseif(file_exists("../Images/$name.jpg"))
                echo "<img class='game_img' src='../Images/$name.jpg'/>";
                else
                    echo "<img class='game_img' src='../Images/default.png'/>"; ?>
                <h3 class="info">Cliquer pour + d'info</h3>
                <h2><?php echo $row['Name'];?></h2>
                <h3>Age minimum: <?php echo $row['Age'];?> ans</h3>
                <p class="abstract"><?php echo $row['Abstract'];?></p>
                <button type='button' onclick='unimplemented()'>Réserver</button>
            </div>
            <?php $i++; } ?>
        </div>
        <script src="js/header.js"></script>
        <script src="js/filtre.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>