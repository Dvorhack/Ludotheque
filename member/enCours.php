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
            <div class="flex-row">
            <?php 
            $query = "SELECT Game.Name, Booking.GetDate, Booking.ReturnDate FROM Game, Booking WHERE Booking.ID_Game=Game.ID_Game AND Booking.ID_Member=".$_SESSION['id']; 
            //echo $query;
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
            <div class="cards" >
                <?php 
                $name = $row['Name'];
                if(file_exists("../Images/$name.png"))
                    echo "<img class='game_img' src='../Images/$name.png'/>";
                elseif(file_exists("../Images/$name.jpg"))
                echo "<img class='game_img' src='../Images/$name.jpg'/>";
                else
                    echo "<img class='game_img' src='../Images/default.png'/>"; ?>
                
                <h2><?php echo $row['Name'];?></h2>
                
                <p ><?php echo $row['GetDate']." -> ".$row['ReturnDate'];?></p>
                
            </div>
            <?php $i++; } ?>
        </div>
        </div>
        <script src="js/header.js"></script>
        <script src="js/filtre.js"></script>
        
    </body>
</html>