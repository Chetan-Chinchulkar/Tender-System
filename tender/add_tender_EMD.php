


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
    <!-- yes/no type for EMD -->
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
        <!-- yes/no form for EMD -->
                <form action="add_tender_EMD.php" method="POST">
                    <div class="form-group">
                        <label for="tender_EMD">Tender EMD</label>
                        <select class="form-control" id="tender_EMD" name="tender_EMD">
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
                        
                        <div class="form-group">
                            <label for="EMD_amount">EMD Amount</label>
                            <input type="text" class="form-control" id="EMD_amount" name="EMD_amount" placeholder="EMD Amount">
                        </div>
                        <!-- form input for EMD in favour of -->
                        <div class="form-group">
                            <label for="EMD_in_favour_of">EMD In Favour of </label>
                            <input type="text" class="form-control" id="EMD_in_favour_of" name="EMD_in_favour_of" placeholder="EMD In Favour Of">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            
                </form>
            <!-- form input for EMD mode of payment -->
            </div>
        </div>
            <script>
                emd = document.getElementById('tender_EMD');
                yes_div = document.getElementsByClassName('yes_div')[0];

                emd.addEventListener('change', function(){
                    if(emd.value == 'yes'){
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
