<!-- php code for adding  details of Pre-bid date,pre-bid time, last date of submission and time of submission -->


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
<!-- html code -->
<html>
<head>
    <title>Tender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/index.css" rel='stylesheet' type='text/css' />
    <link href="css/custom.css" rel='stylesheet' type='text/css' />
    </head>
    <body>
        <!-- create form  -->
        <div class="main-wthree">
            <div class="container">
                <form action="add_tender_bid.php" method="POST">
                    <div class="form-group">
                        <label for="pre_bid_date">Pre-bid Date</label>
                        <input type="date" class="form-control" id="pre_bid_date" name="pre_bid_date" placeholder="Pre-bid Date">
                    </div>
                    <div class="form-group">
                        <label for="pre_bid_time">Pre-bid Time</label>
                        <input type="time" class="form-control" id="pre_bid_time" name="pre_bid_time" placeholder="Pre-bid Time">
                    </div>
                    <div class="form-group">
                        <label for="last_date_of_submission">Last Date of Submission</label>
                        <input type="date" class="form-control" id="last_date_of_submission" name="last_date_of_submission" placeholder="Last Date of Submission">
                    </div>
                    <div class="form-group">
                        <label for="time_of_submission">Time of Submission</label>
                        <input type="time" class="form-control" id="time_of_submission" name="time_of_submission" placeholder="Last Date of Submission">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                    <div class="alert alert-success" id="success" role="alert" style="display: none;" >
                        Tender details added successfully!
                        
                    </div>
                    <div class="alert alert-warning" id="failure" style="display: none;">
                    
                    <strong>Warning!</strong> Check the data entered!
                    
                    </div>
                    
                </form>
            </div>
        </div>
        
    </body>
</html>

<?php
include 'include/footer.php';

?>


<!-- php code to submit form details -->

<?php
if (isset($_POST["submit"])) {

    
    if ($_SESSION['logged_in']==true) {

        $pre_bid_date = $_POST['pre_bid_date'];
        $pre_bid_time = $_POST['pre_bid_time'];
        $last_date_of_submission = $_POST['last_date_of_submission'];
        $time_of_submission = $_POST['time_of_submission'];
        $userid = $_SESSION['userid'];

        // $sql = "INSERT INTO tender_bid (pre_bid_date, pre_bid_time, last_date_of_submission, time_of_submission) VALUES ('$pre_bid_date', '$pre_bid_time', '$last_date_of_submission', '$time_of_submission')";
        // update query to add tender details
        $sql = "UPDATE tender_bid SET pre_bid_date = '$pre_bid_date', pre_bid_time = '$pre_bid_time', last_date_of_submission = '$last_date_of_submission', time_of_submission = '$time_of_submission' WHERE userid = '$userid'";
        
        // $sql = "UPDATE tender_table SET prebiddate='$_POST[pre_bid_date]', prebidtime='$_POST[pre_bid_time]', lastdate='$_POST[last_date_of_submission]', submissiontime='$_POST[time_of_submission]' where userid=$_SESSION[userid]";
        $res = mysqli_query($link, $sql) ;
        
        
        ?>
        <script>document.getElementById('success').style.display = 'block';
        window.location.href = "add_tender_mode.php";
        </script>
        <?php

    }
    else {
        ?>
        <script>
            document.getElementById('failure').style.display = 'block';
            alert("Please login to continue");
            // window.location.href = "login.php";
        </script>
        <?php
    }
}
?>