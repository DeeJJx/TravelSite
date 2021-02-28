<?php
include "db.php";
?>
<style> <?php include "../Assets/stylesheets/stylesheet.css"; ?> </style>
<?php
session_start();

//$connection = mysqli_connect('localhost', 'root', '', 'travel');

//CRUD - CREATE READ UPDATE DELETE



if(isset($_POST['login'])) {


$username = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
$password = htmlspecialchars($_REQUEST['password'], ENT_QUOTES);


//$query = "SELECT * FROM customers WHERE username = '{$username}' ";
$query = "SELECT * FROM customers WHERE username =?";

$stmt = mysqli_stmt_init($connection);
//preapre the prepared statement 
if(!mysqli_stmt_prepare($stmt, $query)){
    echo "SQL statement failed";
} else {
    //bind parameters to the placeholders
    mysqli_stmt_bind_param($stmt, "s", $username);
    //run parameters inside database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


// $select_user_query = mysqli_query($connection, $query);


// if(!$select_user_query) {
//     die("QUERY FAILED" . mysqli_error($connection));
// }


while($row = mysqli_fetch_array($result))  {
    echo $db_id = $row['customerID'];
    $db_username = $row['username'];
    $db_password = $row['password_hash'];
    $db_forename = $row['customer_forename'];
    $db_surname = $row['customer_surname'];
    $db_postcode = $row['customer_postcode'];
    $db_address1 = $row['customer_address1'];
    $db_address2 = $row['customer_address2'];
    $db_dob = $row['date_of_birth'];

}

if (password_verify($password, $db_password)){
    $_SESSION['customerID'] = $db_id;
    $_SESSION['username'] = $db_username;
    $_SESSION['password_hash'] = $db_password;
    $_SESSION['customer_forename'] = $db_forename;
    $_SESSION['customer_surname'] = $db_surname;
    $_SESSION['customer_postcode'] = $db_postcode;
    $_SESSION['customer_address1'] = $db_address1;
    $_SESSION['customer_address2'] = $db_address2;
    $_SESSION['date_of_birth'] = $db_dob;


     
    header("Location: homepage.php");

}  else {
    header("Location: loginFail.php");
}
}
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Travel login page</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="login">
            <img src="../Assets/images/login.png" alt="Essential, people, web icon">
            <form action="login.php" method="POST" class="">
            
                <input type="text" name="username" placeholder="Username">
            
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login" value="Login">
            </form>
        
            <div class="container">
                <h2>Not Registered yet?</h2>
                <a href="register.php">Click Here</a>
            </div>
        </div>
    </body>
</html>