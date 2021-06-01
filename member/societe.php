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
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,300&display=swap" rel="stylesheet"> 
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
            <div class="flex-row">
            <?php 
            $query = "SELECT * FROM Game WHERE Type='Societe'"; 
            if(isset($_SESSION['Age'])){
                $Age = $_SESSION['Age'];
                $query .= " AND Age=$Age";
            }
            if(isset($_SESSION['NbMin'])){
                $NbMin = $_SESSION['NbMin'];
                $query .= " AND J_Min<=$NbMin";
            }
            if(isset($_SESSION['NbMax'])){
                $NbMax = $_SESSION['NbMax'];
                $query .= " AND J_Max>=$NbMax";
            }
            
            $result = $conn->query($query);
            //echo $query;
            $i=0;
            while($row = mysqli_fetch_array($result)){?>
                <div class="cards" onmouseover="elt_over(<?php echo $i ?>)" onmouseout="elt_out(<?php echo $i ?>)" onclick="showInfo(this)">
                    <?php 
                    $name = $row['Name'];
                    if(file_exists("../Images/$name.png"))
                        echo "<img class='game_img' src='../Images/$name.png'/>";
                    elseif(file_exists("../Images/$name.jpg"))
                    echo "<img class='game_img' src='../Images/$name.jpg'/>";
                    else
                        echo "<img class='game_img' src='../Images/default.png'/>"; ?>
                    
                    <div class="text"><?php echo $row['Name'];?></div>
                    <div class="info">Cliquer pour + d'info</div>
                    
                    <button type='button' onclick='unimplemented()'>Réserver</button>
                </div>
                <?php $i++; } ?>
            </div>
        </div>
        <div id="infoBox" class='popup'>
            <div class="popup-content">
                
                
            </div>
        </div>
        <script src="js/header.js"></script>
        <script src="js/filtre.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>