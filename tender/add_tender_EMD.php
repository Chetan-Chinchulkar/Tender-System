


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
                <form name="add_tender_EMD" action="add_tender_EMD.php" method="POST" enctype="multipart/form-data">
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
                        <!-- file upload form -->
                        <div class="form-group">
                            <label for="EMD_file">EMD File</label>
                            <input type="file" class="form-control" id="EMD_file" name="EMD_file" placeholder="EMD File">
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

<!-- php code to submit form -->
<?php
// if (isset($_POST["submit"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if logged in is true
    if ($_SESSION["logged_in"] == true) {
        // get the values from the form
        $tender_EMD = $_POST["tender_EMD"];
        $mode_of_payment = $_POST["mode_of_payment"];
        $EMD_amount = $_POST["EMD_amount"];
        $EMD_in_favour_of = $_POST["EMD_in_favour_of"];
        
        $userid = $_SESSION["userid"];
        
        $ext =  pathinfo($_FILES["EMD_file"]["name"], PATHINFO_EXTENSION);
        $EMD_file = $userid.".".$ext;
        
        // upload file
        $target_dir = "uploads/emd";
        $target_file = $target_dir . $EMD_file;
        $uploadOk = 1;

        // No need to check the existence of file, simply overwrite

        // Check file size
        if ($_FILES["tender_nit"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            exit;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["tender_nit"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["tender_nit"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }

        // update the tender_table
        // $sql = "UPDATE tender_table SET tender_EMD = '$tender_EMD', mode_of_payment = '$mode_of_payment', EMD_amount = '$EMD_amount', EMD_in_favour_of = '$EMD_in_favour_of', EMD_file = '$EMD_file' WHERE userid = '$userid'";
        $sql = "UPDATE tender_table SET TenderEMD = '$tender_EMD', 
        ModePay = '$mode_of_payment', EMDAmount = '$EMD_amount', EMDInFavour = '$EMD_in_favour_of', EMDFile = '$EMD_file' WHERE userid = '$userid'";
        echo $sql;
        // exit;
        $res = mysqli_query($link, $sql);

        ?>
        <script>document.getElementById('success').style.display = 'block';
        window.location.href = "add_tender_manpower.php";
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
