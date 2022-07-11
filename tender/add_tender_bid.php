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

        $sql = "update tender_table set prebiddate=$_REQUEST[pre_bid_date], prebidtime=$_REQUEST[pre_bid_time], lastdate=$_REQUEST[last_date_of_submission], submissiontime=$_REQUEST[time_of_submission]";
        
        $res = mysqli_query($link, $sql) or die(mysqli_error($link));
        
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