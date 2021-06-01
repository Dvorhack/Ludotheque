<?php
if(isset($_GET['name'])){
    include '../../connect_sql.php';
    $query = "SELECT * FROM Game WHERE Name='" . $_GET['name'] . "'";
    //echo $query;
    $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
    $name = $row['Name'];
    echo '<span class="hideInfo">&times;</span>';
    if(file_exists("../../Images/$name.png"))
        echo "<img class='game_img' src='../../Images/$name.png'/>";
    elseif(file_exists("../../Images/$name.jpg"))
    echo "<img class='game_img' src='../../Images/$name.jpg'/>";
    else
        echo "<img class='game_img' src='../../Images/default.png'/>"; ?>
    
    <div class="text"><?php echo $row['Name'];?></div>
    
    <button type='button' onclick='unimplemented()'>Réserver</button>
    
<?php
}

?>