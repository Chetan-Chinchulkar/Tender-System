<!-- form for presentation details  -->


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
<html>
    <head>
    <title>Tender</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/index.css" rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div class="main-wthree">
            <div class="container">
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

                    <div class="yes_div">
                            
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
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <script>
            // if presentation is yes then show div
            var presentation = document.getElementById('presentation');
            var yes_div = document.getElementsByClassName('yes_div')[0];
            presentation.addEventListener('change', function(){
                if(presentation.value == 'yes'){
                    yes_div.style.display = 'block';
                }
                else{
                    yes_div.style.display = 'none';
                }
            });
        </script>
    </body>
</html>

<?php
include 'include/footer.php';

?>

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