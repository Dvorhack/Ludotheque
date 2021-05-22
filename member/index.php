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
        <script src="script.js"></script>
        
    </head>
    <?php 
    include "header.php";
    ?>
    <body>
        <?php 
        include "nav.php";
        ?>
        <div class="main">
            <?php 
            $query = "SELECT * FROM Game"; 
            $result = $conn->query($query);
            while($row = mysqli_fetch_array($result)){?>
            <div class="elt">
                <?php 
                $name = $row['Name'];
                if(file_exists("../Images/$name.png"))
                    echo "<img class='game_img' src='../Images/$name.png'/>";
                elseif(file_exists("../Images/$name.jpg"))
                echo "<img class='game_img' src='../Images/$name.jpg'/>";
                else
                    echo "<img class='game_img' src='../Images/default.png'/>"; ?>
                <h2><?php echo $row['Name'];?></h2>
                <h3>Age minimum: <?php echo $row['Age'];?> ans</h3>
                <p><?php echo $row['Abstract'];?></p>
                <button type='button' onclick='unimplemented()'>Réserver</button>
            </div>
            <?php } ?>
        </div>
        <script src="js/header.js"></script>
    </body>
</html>