<?php
session_start();
include "db.php";

//CRUD - CREATE READ UPDATE DELETE

if(isset($_POST['submit'])) {
   
$username = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$forename =  htmlspecialchars($_REQUEST['customer_forename'], ENT_QUOTES);

// htmlspecialchars($_REQUEST['date_of_birth'], ENT_QUOTES);

$surname =  htmlspecialchars($_REQUEST['customer_surname'], ENT_QUOTES);

$postcode =  htmlspecialchars($_REQUEST['customer_postcode'], ENT_QUOTES);


$address1 =  htmlspecialchars($_REQUEST['customer_address1'], ENT_QUOTES);


$address2 = htmlspecialchars($_REQUEST['customer_address2'], ENT_QUOTES);

// dob must be in 0000-00-00 format

$dob =  htmlspecialchars($_REQUEST['date_of_birth'], ENT_QUOTES);





// CAN DELETE  $connection = mysqli_connect('localhost', 'root', '', 'travel');
   
    //used to test conncection
//    if($connection){
//        echo "we are connected";
//    } else {
//        die("Database connection failed");
//    }
// $connection->beginTransaction();
// $sql2->execute(array(':activityID'=>$activityID));
// $connection -> prepare




   
   $query = "INSERT INTO customers(username, password_hash, customer_forename, customer_surname,
            customer_postcode, customer_address1, customer_address2, date_of_birth) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $query)){
    echo "Details not registered";
    } else {
    mysqli_stmt_bind_param($stmt, "ssssssss", $username, $password, $forename, $surname, $postcode, $address1, $address2, $dob);
    mysqli_stmt_execute($stmt);
    echo "<h2>Details Registered</h2>";
    }
        
//    $result = mysqli_query($connection, $query);

//    if(!$result){
//        die('Query Failed' . mysqli_error($connection));
//    } else if ($result) {
//         echo "details registered";
//    }




}


// $query = "INSERT INTO customers(username, password_hash, customer_forename, customer_surname,
// customer_postcode, customer_address1, customer_address2, date_of_birth) 
// VALUES('$username', '$password', '$forename', '$surname',
// '$postcode', '$address1', '$address2', '$dob')";
// $result = mysqli_query($connection, $query);

// if(!$result){
// die('Query Failed' . mysqli_error($connection));
// } else if ($result) {
// echo "details registered";
// }
// }

    //CHECK TO SEE IF DATA IS ENTERED TO TABLE
    // if($username && $password){

    // echo $username;
    // echo $password;
    // }else{
    //     echo "nooooo";
    // }


?>


<!DOCTYPE html>
<html lang="en">
<head>
<style> <?php include "../Assets/stylesheets/stylesheet.css"; ?> </style>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="homepage.php">Home</a>
<div class="container">
    <div class="login">
    <img src="../Assets/images/login.png" alt="login_image">
    <form action="register.php" method="post">
    <div>
            <label for="username">Username</label>
            <input type="username" name="username" class="">
    </div>
    <br>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" class="">
        </div>
        <br>
        <div>
            <label for="customer_forename">Forename</label>
            <input type="customer_forename" name="customer_forename" class="">
        </div>
        <br>
        <div>
            <label for="customer_surname">Surname</label>
            <input type="customer_surname" name="customer_surname" class="">
        </div>
        <br>
        <div>
            <label for="customer_postcode">Postcode</label>
            <input type="customer_postcode" name="customer_postcode" class="">
        </div>
        <br>
        <div>
            <label for="customer_address1">Address Line 1</label>
            <input type="customer_address1" name="customer_address1" class="">
        </div>
        <br>
        <div>
            <label for="customer_address2">Address Line 2</label>
            <input type="customer_address2" name="customer_address2" class="">
        </div>
        <br>
        <div>
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" class="">
        </div>
        <input class="" type="submit" name="submit" value="Register">
    </form>
    </div>
</div>
<div class="container">
        <h2>Already registered?</h2>
        <a href="login.php">Click Here To Login</a>
</div>
 
</body>


</html>