<?php
session_start();
include "db.php";
include "includes/header.php";
include "includes/nav.php";

if(!isset($_SESSION['username'])){
   header("Location: login.php");
}



if(isset($_POST['submit'])){
                
    $search = htmlspecialchars($_POST['search']);
        
        
    $query = "SELECT * FROM activities 
                 WHERE CONCAT(activity_name, ' ', description) LIKE '%$search%'";
    $search_query = mysqli_query($connection, $query);

    if(!$search_query) {

        die("QUERY FAILED" . mysqli_error($connection));

    }

    $count = mysqli_num_rows($search_query);

    if($count == 0) {

        echo "<h1>Activities do not match your description</h1>";

    } else {

        while($row = mysqli_fetch_assoc($search_query)) {
            $activityID = $row['activityID'];
            $activity_name = $row['activity_name'];
            $description = $row['description'];
            $location = $row['location'];    
            ?>
                    <p>
                        <a href="activities.php"><?php echo $activity_name ?></a>
                    </p>
                    <p><span class=""></span> <?php echo $location ?></p>
                    <p><?php echo $description ?></p>
                    <a href="activities.php">Book Here</a>
    
                    <hr>
    
    
       <?php }
    
    
                }
    
    
                
                }
    
    

    ?>   
<html>
<h3>Search For Activities</h3>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                Search
                        </button>
                        </span>
                    </div>
                    </form>
                    <?php     include "includes/footer.php"; ?>

</html>