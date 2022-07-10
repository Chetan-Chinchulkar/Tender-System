<!-- refund status -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Tender Refund</title>
    
         
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <!-- form dropdown for refund status -->
    <form action="add_tender_refund.php" method="post">
        <select name="refund_status">
            <option value="1">Refunded</option>
            <option value="2">Not Refunded</option>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>


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