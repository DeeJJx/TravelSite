<?php 

// define db server
// define username
// define password
// define name""
/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'w13021173');
define('DB_PASSWORD', 'JOHNSON');
define('DB_NAME', 'w13021173'); FOR ADMINER */


$connection = mysqli_connect('127.0.0.1', 'w13021173', 'JOHNSON', 'w13021173');

//$connection = mysqli_connect('localhost', 'root', '', 'travel');
   
//used to test connection
// if($connection){
//     echo "we are connected";
// } else {
//     die("Database connection failed");
// }
?>