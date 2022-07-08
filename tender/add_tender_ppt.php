<!-- form for presentation details  -->

<!DOCTYPE html>
<html>
    <head>
        <title>Tender</title>
    </head>
    <body>
        <!-- create form  -->
        <form action="add_tender_ppt.php" method="POST">
            <!-- option for presentation in yes/no -->
            <!-- if yes show options for date and ppt details -->
            <div class="form-group">
                <label for="presentation">Presentation</label>
                <select class="form-control" id="presentation" name="presentation">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <!-- if yes show options for date and ppt details -->
            <div class="form-group">
                <label for="presentation_date">Presentation Date</label>
                <input type="date" class="form-control" id="presentation_date" name="presentation_date" placeholder="Presentation Date">
            </div>
            <div class="form-group">
                <label for="presentation_time">Presentation Time</label>
                <input type="time" class="form-control" id="presentation_time" name="presentation_time" placeholder="Presentation Time">
            </div>
            <div class="form-group">
                <label for="presentation_venue">Presentation Venue</label>
                <input type="text" class="form-control" id="presentation_venue" name="presentation_venue" placeholder="Presentation Venue">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

    </body>
</html>

<!-- php code for submit code -->
<?php
    if (isset($_POST["submit1"])) {
        $count = 0;

        $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
        $count = mysqli_num_rows($res);
        if ($count == 0) {
            echo "<script>document.getElementById('failure').style.display = 'block';</script>";
        } else {
            $res = mysqli_query($link, "insert into tender values('$_POST[presentation]','$_POST[presentation_date]','$_POST[presentation_time]','$_POST[presentation_venue]')") or die(mysqli_error($link));
            echo "<script>document.getElementById('success').style.display = 'block';</script>";
        }
    }
?>