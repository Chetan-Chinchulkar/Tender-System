
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
    <style>
        td{
            text-align: center;
            color: black !important;
        }
        th{
            text-align: center !important;
        }
        .main-container{
            border: 1px solid grey !important;
            border-radius: 10px !important;
            /* margin: auto !important; */
            padding: 1.5% ;
            min-width: 70%;
            
        }
    </style>
    <body>
        <div class="main-wthree">
            <div class="container main-container">
                <!-- display all details in table based on the ID -->
                <?php
                $userid = $_SESSION['userid'];
                $sql = "SELECT * FROM tender WHERE userid = '$userid'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                <b>Serial No</b>
                            </th>
                            <th>
                                <b>City</b>
                            </th>
                            <th>
                                <b>State</b>
                            </th>
                            <th>
                                <b>Tender ID</b>
                            </th>
                            <th>
                                <b>Tender Name</b>
                            </th>
                            <th>
                                <b>Tender Description</b>
                            </th>
                            <th>
                                <b>Tender Date</b>
                            </th>
                            <th>
                                <b>Tender Time</b>
                            </th>
                            <th>
                                <b>Tender Status</b>
                            </th>
                            <th>
                                <b>Tender Type</b>
                            </th>
                            <th>
                                <b>Tender Category</b>
                            </th>

            </div>
        </div>

    </body>
</html>

<?php
include 'include/footer.php';

?>