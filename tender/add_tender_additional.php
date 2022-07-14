


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
            <!-- code for textarea for performance gurantee -->
                <form action="add_tender.php" method="POST">
                    <div class="form-group">
                        <label for="performance_guarantee">Performance Guarantee</label>
                        <textarea class="form-control" id="performance_guarantee" name="performance_guarantee" rows="3"></textarea>
                    </div>
                    <!-- textarea for contract signing -->
                    <div class="form-group">
                        <label for="contract_signing">Contract Signing</label>
                        <textarea class="form-control" id="contract_signing" name="contract_signing" rows="3"></textarea>
                    </div>
                    <!-- date range for contract period -->
                    <div class="form-group">
                        <label for="contract_period">Contract Period</label>
                        <input type="text" class="form-control" id="contract_period" name="contract_period" placeholder="Enter Contract Period">
                    </div>
                    <!-- date for expiry -->
                    <div class="form-group">
                        <label for="expiry">Expiry</label>
                        <input type="date" class="form-control" id="expiry" name="expiry" placeholder="Enter Expiry">
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

<!-- code for submit form -->


<!-- php code to submit form -->
<?php
if (isset($_POST["submit"])) {
    // if logged in is true
    if ($_SESSION["loggedin"] == true) {
        // get the values from the form
        $performance_guarantee = $_POST["performance_guarantee"];
        $contract_signing = $_POST["contract_signing"];
        $contract_period = $_POST["contract_period"];
        $expiry = $_POST["expiry"];
        $userid = $_SESSION["userid"];

        // update tender_table
        $sql = "UPDATE tender_table SET performance_guarantee = '$performance_guarantee', contract_signing = '$contract_signing', contract_period = '$contract_period', expiry = '$expiry' WHERE userid = '$userid'";
        $res = mysqli_query($link, $sql);


        ?>
        <script>document.getElementById('success').style.display = 'block';
        alert('Tender details added successfully!');
        // window.location.href = "add_tender_EMD.php";
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


<?php
    // if (isset($_POST["submit"])) {
    //     $count = 0;

    //     $res = mysqli_query($link, "select * from admin where username='$_POST[username]' && password ='$_POST[password]'") or die(mysqli_error($link));
    //     $count = mysqli_num_rows($res);
    //     if ($count == 0) {
    //         echo "<script>document.getElementById('failure').style.display = 'block';</script>";
    //     } else {
    //         $res = mysqli_query($link, "insert into tender values('$_POST[performance_guarantee]','$_POST[contract_signing]','$_POST[contract_period]','$_POST[expiry]')") or die(mysqli_error($link));
    //         echo "<script>document.getElementById('success').style.display = 'block';</script>";
    //     }
    // }
?>