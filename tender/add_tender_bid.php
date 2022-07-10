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
    </head>
    <body>
        <!-- create form  -->
        <div class="main-wthree">
            <div class="container">
                <form action="add_tender.php" method="POST">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
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
    if (isset($_POST["submit1"])) {
        $count = 0;

        $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);
        if ($count == 0) {
            echo "<script>document.getElementById('failure').style.display = 'block';</script>";
        } else {
            $res = mysqli_query($link, "insert into tender values('$_POST[pre_bid_date]','$_POST[pre_bid_time]','$_POST[last_date_of_submission]','$_POST[time_of_submission]')") or die(mysqli_error($link));
            echo "<script>document.getElementById('success').style.display = 'block';</script>";
        }
    }
?>