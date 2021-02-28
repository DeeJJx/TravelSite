<?php
session_start();
include "db.php";
include "includes/header.php";
include "includes/nav.php";

if(!isset($_SESSION['username'])){
   header("Location: login.php");
}

if(isset($_POST['submit'])){
    $activityID = $_POST['activityID'];
    $date_of_activity = $_POST['date'];
    $number_of_tickets = $_POST['number_of_tickets'];
    $db_id = $_POST['customerID'];

    
    $sql2 = "INSERT INTO booked_activities(activityID, customerID, date_of_activity, number_of_tickets)
       VALUES (?, ?, ?, ?);";
   // $connection->beginTransaction();
   // $sql2->execute(array(':activityID'=>$activityID));
   // $connection -> prepare
   $stmt = mysqli_stmt_init($connection);
   //if(mysqli_stmt_execute($stmt)){
   if(!mysqli_stmt_prepare($stmt, $sql2)){
      
      echo "
      <div class='registered'>
      <h2>Cannot book same activity twice</h2>
      </div>";

   } else {
      mysqli_stmt_prepare($stmt, $sql2);
      mysqli_stmt_bind_param($stmt, "ssss", $activityID, $db_id, $date_of_activity, $number_of_tickets);
      mysqli_stmt_execute($stmt);

      echo "<div class='registered'>
      <h2>Your booking has now been registered</h2>
      </div>
      ";
   }

//    $bookedresult = mysqli_query($connection, $sql2);

//    if(!$bookedresult){
//    echo 'Query Failed ' . mysqli_error($connection); //test for primary duplicate;
//   // echo "Cannot book same activity twice";
// } else if ($bookedresult) {
//      echo "booking registered";
// }

}

echo "<h3>Activities Available</h3>";


$query = mysqli_query($connection, "SELECT * FROM activities");



echo "<table border='1'>
<tr>
<th>Activity</th>
<th>Description</th>
<th>Price</th>
<th>Location</th>


</tr>";

while($row = mysqli_fetch_array($query))
{
echo "<tr>";
echo "<td>" . $row['activity_name'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['location'] . "</td>";
echo "</tr>";
}
echo "</table>";

echo "<h3>Book Activities Here</h3>";


include "activities2.php";

include "includes/footer.php";

?>

