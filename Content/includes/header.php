<?php session_start();
if(!isset($_SESSION['username'])){
   header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KF7013 - Cusco Travel Page</title>
    <link href="../Assets/stylesheets/stylesheet.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="head_img">
        <img src="../Assets/images/banner.jpg" alt="AutumnMood">
    </div>
    <h1>
        Cusco Tourist Information
    </h1>
</header>
<!-- Check header included
 <h1>HEADER INCLUDED</h1> -->
</body>
</html>