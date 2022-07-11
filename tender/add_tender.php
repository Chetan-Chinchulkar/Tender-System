<!-- get data for serial number, city, state, client name, description, tender number, tender date -->


<!-- create login system with mysql database -->
<?php
include 'include/connection.php';

// start session
// session_start();
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
        <div class="main-wthree">
            <div class="container">
            <!-- create form  -->
                <form action="add_tender.php" method="POST">
                    <div class="form-group">
                        <label for="serial_number">Serial Number</label>
                        <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="Serial Number" disabled>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City">
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="State">
                    </div>
                    <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <label for="tender_number">Tender Number</label>
                        <input type="text" class="form-control" id="tender_number" name="tender_number" placeholder="Tender Number">
                    </div>
                    <div class="form-group">
                        <label for="tender_date">Tender Date</label>
                        <input type="date" class="form-control" id="tender_date" name="tender_date" placeholder="Tender Date">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" >Submit</button>


                    <div class="alert alert-warning" id="failure" style="display: none;">
                    <strong>Warning!</strong> Indicates a warning that might need attention.
                    
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
</html>

<?php
include 'include/footer.php';

?>


<!-- add php code to submit the form details -->
<?php
if (isset($_POST["submit"])) {

    if ($_SESSION['logged_in'] ==false) {
        // echo "<script>document.getElementById('failure').style.display = 'block';</script>";
        
        $res = mysqli_query($link, "insert into $table values('$_POST[serial_number]','$_POST[city]','$_POST[state]','$_POST[client_name]','$_POST[description]','$_POST[tender_number]','$_POST[tender_date]')") or die(mysqli_error($link));
        echo "<script>document.getElementById('success').style.display = 'block';</script>";
        header("location: add_tender_bid.php");
    }
    else {
        ?>
        <script>
            document.getElementById('failure').style.display = 'block';
            alert("Please login to continue");
            window.location.href = "login.php";
        </script>
        <?php
    }
}
?>