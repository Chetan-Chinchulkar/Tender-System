<!-- details of tech opeening and financial opening -->


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
                <form action="add_tender_opening.php" method="POST">
                    <div class="form-group">
                        <label for="tech_opening">Tech Opening</label>
                        <input type="date" class="form-control" id="tech_opening" name="tech_opening" placeholder="Tech Opening">
                    </div>
                    <!-- div for status update -->
                    <div class="form-group">
                        <label for="status_update">Status Update</label>
                        <input type="text" class="form-control" id="status_update" name="status_update" placeholder="Status Update">    
                    </div>
                    <div class="form-group">
                        <label for="financial_opening">Financial Opening</label>
                        <input type="date" class="form-control" id="financial_opening" name="financial_opening" placeholder="Financial Opening">
                    </div>
                    <!-- add remarks too -->
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks">
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
    </body>
</html>

<?php
include 'include/footer.php';

?>


<!-- php code to submit form -->
<?php
if (isset($_POST["submit"])) {
    // if logged in is true
    if ($_SESSION["loggedin"] == true) {
        // get the values from the form
        $tech_opening = $_POST["tech_opening"];
        $status_update = $_POST["status_update"];
        $financial_opening = $_POST["financial_opening"];
        $remarks = $_POST["remarks"];
        $userid = $_SESSION["userid"];

        // update tender_table
        $sql = "UPDATE tender_table SET tech_opening = '$tech_opening', status_update = '$status_update', financial_opening = '$financial_opening', remarks = '$remarks' WHERE userid = '$userid'";
        $res = mysqli_query($link, $sql);

        ?>
        <script>document.getElementById('success').style.display = 'block';
        window.location.href = "add_tender_refund.php";
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

<!-- php code to submit form details -->
<?php
    // if (isset($_POST["submit1"])) {
    //     $count = 0;

    //     $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
    //     $count = mysqli_num_rows($res);
    //     if ($count == 0) {
    //         echo "<script>document.getElementById('failure').style.display = 'block';</script>";
    //     } else {
    //         $res = mysqli_query($link, "insert into tender values('$_POST[tech_opening]','$_POST[financial_opening]','$_POST[remarks]')") or die(mysqli_error($link));
    //         echo "<script>document.getElementById('success').style.display = 'block';</script>";
    //     }
    // }
?>