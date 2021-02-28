<?php
session_start();
include "db.php";
include "includes/header.php";   
include "includes/nav.php"; 

if(!isset($_SESSION['username'])){
    header("Location: login.php");
 }

 $db_id = $_SESSION['customerID'];

// $query = mysqli_query($connection, "SELECT * FROM booked_activities INNER JOIN activities ON booked_activities.activityID = activities.activityID WHERE booked_activities.customerID LIKE $db_id");
 
 
 /* mysqli_query($connection, "SELECT * FROM booked_activities WHERE customerID LIKE $_SESSION[customerID]");
                   INNER JOIN activities ON booked_activities.activityID = activities.activityID");*/

                   //created a template
$query = "SELECT * FROM booked_activities INNER JOIN activities ON booked_activities.activityID = activities.activityID WHERE booked_activities.customerID=?";
//create a prepared statement

$stmt = mysqli_stmt_init($connection);
//preapre the prepared statement 
if(!mysqli_stmt_prepare($stmt, $query)){
    echo "SQL statement failed";
} else {
    //bind parameters to the placeholders
    mysqli_stmt_bind_param($stmt, "i", $db_id);
    //run parameters inside database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


echo "<table border='1'>
<tr>
<th>Activity</th>
<th>Date</th>
<th>Tickets</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['activity_name'] . "</td>";
echo "<td>" . $row['date_of_activity'] . "</td>";
echo "<td>" . $row['number_of_tickets'] . "</td>";
echo "</tr>";
}
echo "</table>";
}

include "includes/footer.php";

?>
