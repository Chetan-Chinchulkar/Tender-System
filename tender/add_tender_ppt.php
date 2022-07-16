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
    <link href="css/custom.css" rel='stylesheet' type='text/css' />
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
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    <div class="alert alert-success" id="success" role="alert" style="display: none;" >
                        Tender details added successfully!
                        
                    </div>
                    <div class="alert alert-warning" id="failure" style="display: none;">
                    
                    <strong>Warning!</strong> Check the data entered!
                    
                    </div>
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

<!-- php code to submit form -->
<?php
if (isset($_POST["submit"])) {
    // if logged in is true
    if ($_SESSION["logged_in"] == true) {
        // get the values from the form
        $ppt = $_POST["presentation"];
        $ppt_date = $_POST["presentation_date"];
        $ppt_time = $_POST["presentation_time"];
        $ppt_venue = $_POST["presentation_venue"];
        $userid = $_SESSION["userid"];

        if ($ppt == "no") {
            // update tender_table
            $sql = "UPDATE tender_table SET PPT = '$ppt', pptDate = NULL, pptTime = NULL, Venue = NULL WHERE userid = '$userid'";
            $res = mysqli_query($link, $sql);
        } else {
            // update tender_table
            $sql = "UPDATE tender_table SET PPT = '$ppt', pptDate = '$ppt_date', pptTime = '$ppt_time', Venue = '$ppt_venue' WHERE userid = '$userid'";
            $res = mysqli_query($link, $sql);
        }

        ?>
        <script>document.getElementById('success').style.display = 'block';
        window.location.href = "add_tender_allocation.php";
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
