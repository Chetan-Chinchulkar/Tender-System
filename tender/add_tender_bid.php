<!-- php code for adding  details of Pre-bid date,pre-bid time, last date of submission and time of submission -->

<!DOCTYPE html>
<!-- html code -->
<html>
    <head>
        <title>Tender</title>
    </head>
    <body>
        <!-- create form  -->
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
    </body>
</html>


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