<!-- get data for serial number, city, state, client name, description, tender number, tender date -->


<!-- create login system with mysql database -->
<?php
include 'include/connection.php';

// start session
session_start();
?>

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
                <!-- <form action="add_tender.php" method="POST"> -->
                <form action="add_tender.php" method="POST" enctype="multipart/form-data">

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
                    <!-- tender NIT upload -->
                    <div class="form-group">
                        <label for="tender_nit">Tender NIT</label>
                        <label > .pdf, .txt, .jpeg format only</label>
                        <input type="file" class="form-control" id="tender_nit" name="tender_nit" placeholder="Tender NIT" >
                    </div>

                    <div class="form-group">
                        <label for="website_or_portal_link">Website or Portal Link</label>
                        <input type="text" class="form-control" id="website_or_portal_link" name="website_or_portal_link" placeholder="Website or Portal Link" >
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" >Submit</button>

                    <div class="alert alert-success" id="success" role="alert" style="display: none;" >
                        Tender details added successfully!
                        
                    </div>
                    <div class="alert alert-warning" id="failure" style="display: none;">
                    
                    <strong>Warning!</strong> Check the entered data!
                    
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
        // print $_SESSION['userid'] in alert

            $count = 0;
            $userid = $_SESSION['userid'];
            // get data
            // $serial_number = $_POST['serial_number'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $client_name = $_POST['client_name'];
            $description = $_POST['description'];
            $tender_number = $_POST['tender_number'];
            $tender_date = $_POST['tender_date'];
            $tender_nit = $_POST['tender_nit'];
            // $tender_nit = $_FILES['tender_nit']['name'];
            $website_or_portal_link = $_POST['website_or_portal_link'];


            $res = mysqli_query($link, "select * from tender_table where userid='$userid' ") or die(mysqli_error($link));
            $count = mysqli_num_rows($res);

            // if count is 0, then insert the data
            if ($count == 0) {
               
                // upload file
                // $target_dir = "uploads/";
                // $target_file = $target_dir . basename($_FILES["tender_nit"]["name"]);
                // $uploadOk = 1;

                // // Check if file already exists
                // if (file_exists($target_file)) {
                //     echo "Sorry, file already exists.";
                //     $uploadOk = 0;
                // }
                // // Check file size
                // if ($_FILES["tender_nit"]["size"] > 500000) {
                //     echo "Sorry, your file is too large.";
                //     $uploadOk = 0;
                // }

                // insert data into database
                $sql = "INSERT INTO tender_table (userid,serialno, city, states, clientname, descriptions, tendernumber, tenderdate, tendernit, weblink) 
                            VALUES ( '$userid',NULL, '$city', '$state', '$client_name', '$description', '$tender_number', '$tender_date', NULL , '$website_or_portal_link')";

                // $sql = "insert into tender_table (userid, city, state, clientname, description, tendernumber, tenderdate) values('$_SESSION[userid]', '$_POST[city]','$_POST[state]','$_POST[client_name]','$_POST[description]','$_POST[tender_number]','$_POST[tender_date]') ";
                // $sql = "select * from admin where userid = '$userid'";
                $res = mysqli_query($link, $sql) or die(mysqli_error($link));
                }
                else {
                    // update date in tender_table
                    $sql = "UPDATE tender_table SET city='$city', states='$state', clientname='$client_name', descriptions='$description', tendernumber='$tender_number', tenderdate='$tender_date', weblink='$website_or_portal_link' WHERE userid='$userid'";
                    $res = mysqli_query($link, $sql) or die(mysqli_error($link));
                }
            
            ?>
            <script>document.getElementById('success').style.display = 'block';
            window.location.href = "add_tender_bid.php";
            </script>
            <?php
            // header("location: add_tender_bid.php");
      
    }
    
?>