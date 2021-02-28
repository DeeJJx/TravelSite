<?php
include "db.php";

     $sql = "SELECT * FROM activities"; 
     $query = mysqli_query($connection, "SELECT * FROM activities");
     while ( $results[] = mysqli_fetch_object ( $query ) );
     array_pop ( $results );

     
?>


<html>

<form action="activities.php" method="post" id="bookForm">

<select name="activityID">
     <?php foreach ( $results as $option ) : ?>
          <option value="<?php echo $option->activityID; ?>"><?php echo $option->activity_name; ?></option>
     <?php endforeach; ?>
</select>
<?php
echo "<td><select name='number_of_tickets'>";
 for($number_of_tickets=0; $number_of_tickets<=100; $number_of_tickets++){
    echo "<option value= '$number_of_tickets'> $number_of_tickets </option>";
 }
"</select></td>";
?>
<input type="date" name="date" id="date">
<input type="hidden" id="customerID" name="customerID" value=" <?php echo $_SESSION['customerID']; ?> " >
<input class="" type="submit" name="submit" value="Submit">




</form>


</html>
