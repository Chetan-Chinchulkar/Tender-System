



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
<!-- form for yes/no in tender fee -->
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
                <form action="add_tender_fee.php" method="POST">
                    <div class="form-group">
                        <label for="tender_fee">Tender Fee</label>
                        <select class="form-control" id="tender_fee" name="tender_fee">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="yes_div">
                        <!-- form inputs for mode of payment as Online RTGS,DD,Online Portal-->
                        <div class="form-group">
                            <label for="mode_of_payment">Mode of Payment</label>
                            <select class="form-control" id="mode_of_payment" name="mode_of_payment">
                                <option value="online_rtgs">Online RTGS</option>
                                <option value="dd">DD</option>
                                <option value="online_portal">Online Portal</option>
                            </select>
                        </div>
                        <!-- form input for amount -->
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                        </div>
                        <!-- form input for in favour of -->
                        <div class="form-group">
                            <label for="in_favour_of">In Favour Of</label>
                            <input type="text" class="form-control" id="in_favour_of" name="in_favour_of" placeholder="In Favour Of">
                        </div>
                        <!-- file UTR upload -->
                        <div class="form-group">
                            <label for="UTR">UTR</label>
                            <input type="file" class="form-control" id="UTR" name="UTR" placeholder="UTR">
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
        <!-- script to display Yes or No according to selected option  -->
        <script>
            var tender_fee = document.getElementById("tender_fee");
            var yes_div = document.getElementsByClassName("yes_div")[0];

            tender_fee.addEventListener("change", function(){
                if(tender_fee.value == "yes"){
                    yes_div.style.display = "block";
                }
                else{
                    yes_div.style.display = "none";
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
    if ($_SESSION["loggedin"] == true) {
        // get the values from the form
        $tender_fee = $_POST["tender_fee"];
        $mode_of_payment = $_POST["mode_of_payment"];
        $amount = $_POST["amount"];
        $in_favour_of = $_POST["in_favour_of"];
        $UTR = $_FILES["UTR"]["name"];
        $userid = $_SESSION["userid"];

        // update the tender_table table
        $sql = "UPDATE tender_table SET tender_fee = '$tender_fee', mode_of_payment = '$mode_of_payment', amount = '$amount', in_favour_of = '$in_favour_of', UTR = '$UTR' WHERE userid = '$userid'";
        $res = mysqli_query($link, $sql);


        ?>
        <script>document.getElementById('success').style.display = 'block';
        window.location.href = "add_tender_EMD.php";
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
