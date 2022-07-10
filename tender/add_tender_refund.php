<!-- refund status -->


<!-- create login system with mysql database -->
<?php
include 'include/connection.php';

// start session
session_start();
?>

<!-- include right_bar.php -->
<?php
include 'include/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tender</title>
        
            
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->
    <body>
        <div class="main-wthree">
            <div class="container">
                <!-- form dropdown for refund status -->
                <form action="add_tender_refund.php" method="post">
                    <!-- label for REfund -->

                        <!-- option for presentation in yes/no -->
                        <!-- if yes show options for date and ppt details -->
                        <div class="form-group">
                            <label for="presentation">Presentation</label>
                            <select class="form-control" id="presentation" name="presentation">
                                <option value="refund">Refunded</option>
                                <option value="norefund">Not Refunded</option>
                            </select>
                        </div>

                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
</body>
</html>


<?php
include 'include/footer.php';

?>



<?php
    // Path to the database file
    require_once('include/connection.php');
    // Check if the form has been submitted
    if (isset($_POST['refund_status'])) {
        // Get the form data
        $refund_status = $_POST['refund_status'];
        // Update the database
        $sql = "UPDATE tender SET refund_status = '$refund_status' WHERE tender_id = '$tender_id'";
        $result = mysqli_query($db, $sql);
        // Check if the query was successful
        if ($result) {
            // Query was successful
            echo '<p>Refund status updated successfully.</p>';
        } else {
            // Query failed
            echo '<p>Refund status update failed.</p>';
        }
    }
?>