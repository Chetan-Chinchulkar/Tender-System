



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
                <form action="add_tender_fee.php" method="POST" enctype="multipart/form-data">
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // if logged in is true
    if ($_SESSION["logged_in"] == true) {
        // get the values from the form
        $tender_fee = $_POST["tender_fee"];
        $mode_of_payment = $_POST["mode_of_payment"];
        $amount = $_POST["amount"];
        $in_favour_of = $_POST["in_favour_of"];
        
        $userid = $_SESSION["userid"];


        $ext =  pathinfo($_FILES["UTR"]["name"], PATHINFO_EXTENSION);
        $UTR = $userid.".".$ext;

        // $UTR = $_FILES["UTR"]["name"];

        // upload file
        $target_dir = "uploads/utr/";
        $target_file = $target_dir . $UTR;
        $uploadOk = 1;

        // No need to check the existence of file, simply overwrite

        // Check file size
        if ($_FILES["UTR"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            exit;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["UTR"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["UTR"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
            }
        }

        // update the tender_table table
        $sql = "UPDATE tender_table SET TenderFee = '$tender_fee', ModePayment = '$mode_of_payment', Amount = '$amount', InFavourOf = '$InFavourOf', UTR = '$UTR' WHERE userid = '$userid'";
        $res = mysqli_query($link, $sql) or die(mysqli_error($link));


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
