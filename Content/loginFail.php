<?php
session_start();
function _e($string) {
   echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link href="../Assets/stylesheets/stylesheet.css" rel="stylesheet" type="text/css">
        <title>Travel login page</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="login">
            <img src="../Assets/images/login.png" alt="login_image">
            <form action="login.php" method="POST" class="">
            
                <input type="text" name="username" placeholder="Username">
            
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login" value="Login">
            </form>
        
            <div class="container">
               <h3>Password incorrect, please try again</h3>
                <h2>Not Registered yet?</h2>
                <a href="register.php">Click Here</a>
            </div>
        </div>
    </body>
</html>
