



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
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
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
