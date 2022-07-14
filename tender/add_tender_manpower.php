

<!-- form input if manpower is required -->


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
                <form action="add_tender_manpower.php" method="POST">
                    <div class="form-group">
                        <label for="manpower">Manpower</label>
                        <select class="form-control" id="manpower" name="manpower">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <!-- form input for manpower option for offsite or deployment -->
                    <div class="manpower_div" id="manpower_div">

                        <div class="form-group">
                            <label for="manpower_option">Manpower Option</label>
                            <select class="form-control" id="manpower_option" name="manpower_option">
                                <option value="offsite">Offsite</option>
                                <option value="deployment">Deployment</option>
                            </select>
                        </div>
                        <!-- text input for list of personal required -->
                        <div class="form-group">
                            <label for="personal_required">Personal Required</label>
                            <textarea class="form-control" id="personal_required" name="personal_required" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
            // to show option for Manpower if Yes is selected
            var manpower = document.getElementById("manpower");
            var manpower_div = document.getElementById("manpower_div");

            manpower.addEventListener("change", function() {
                if (manpower.value == "yes") {
                    manpower_div.style.display = "block";
                } else {
                    manpower_div.style.display = "none";
                }
            });
        </script>
    </body>
</html>

<?php
include 'include/footer.php';

?>

<?php
if (isset($_POST["submit"])) {
    // if logged in is true
    if ($_SESSION["loggedin"] == true) {
        // get the values from the form
        $manpower = $_POST["manpower"];
        $manpower_option = $_POST["manpower_option"];
        $personal_required = $_POST["personal_required"];
        $tender_id = $_SESSION["tender_id"];
        $user_id = $_SESSION["user_id"];

        // update tender_table
        $sql = "UPDATE tender_table SET manpower = '$manpower', manpower_option = '$manpower_option', personal_required = '$personal_required' WHERE tender_id = '$tender_id'";
        $res = mysqli_query($link, $sql);


        ?>
        <script>document.getElementById('success').style.display = 'block';
        window.location.href = "add_tender_ppt.php";
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
