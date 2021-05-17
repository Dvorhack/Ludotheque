<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location: http://ludo.serviel.fr/main.php");
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
        <div class="card">
            <form onsubmit="event.preventDefault()" class="box">
                <h1>Login</h1>
                <p class="text-muted"> Please enter your login and password!</p> 
                <input type="text" name="" placeholder="Username"> 
                <input type="password" name="" placeholder="Password"> 
                <a class="forgot text-muted" href="#">Forgot password?</a> 
                <input type="submit" name="" value="Login" href="#">
            </form>
        </div>
    </body>
</html>